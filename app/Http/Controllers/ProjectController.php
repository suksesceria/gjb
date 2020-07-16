<?php

namespace App\Http\Controllers;

use App\CostReportOffice;
use App\CostReportRealtime;
use App\Employee;
use App\MaterialReport;
use App\MaterialType;
use App\MaterialUnit;
use App\Progress;
use App\Project;
use App\ProjectProgressPlan;
use App\ProjectStep;
use App\ProjectSubStep;
use App\ProjectType;
use App\SupportingDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user()->projects;
        return view('projects.list', compact(['data']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProgress($id)
    {
        $project = Project::with(['steps', 'steps.substeps', 'steps.substeps.progress_plans', 'steps.substeps.progresses', 'progresses'])->findOrFail($id);
        $progressPlanStartDate = $project->substeps()->orderBy('estimated_start_date')->first()->estimated_start_date;
        $progressPlanEndDate = $project->substeps()->orderByDesc('estimated_end_date')->first()->estimated_end_date;
        $totalWeeks = ceil($progressPlanEndDate->diffInDays($progressPlanStartDate) / 7);
        $totalMonths = ceil($totalWeeks/4);

        $realStartDate = $project->progresses()->orderBy('progress_date')->first();
        if ($realStartDate) {
            $progressStartDate = $realStartDate->progress_date;
            if ($project->progresses->sum('progress_add') >= 100) {
                $progressEndDate = $project->progresses()->orderByDesc('progress_date')->first()->progress_date;
            } else {
                $progressEndDate = null;
            }
            $lastProgressDate = $progressEndDate;
            if (! $lastProgressDate) {
                $lastProgressDate = $project->progresses()->orderByDesc('progress_date')->first();;
            }
            if ($lastProgressDate) {
                $lastProgressDate = $lastProgressDate->progress_date;
                $totalWeeksProgress = ceil($lastProgressDate->diffInDays($progressStartDate)/7);
                if ($totalWeeksProgress == 0) {
                    $totalWeeksProgress = 1;
                }
                $totalMonthsProgress = ceil($totalWeeksProgress/4);
            } else {
                $totalWeeksProgress = 0;
                $totalMonthsProgress = 0;
            }

        } else {
            $lastProgressDate = null;
            $progressStartDate = null;
            $progressEndDate = null;
            $totalWeeksProgress = 0;
            $totalMonthsProgress = 0;
        }

        return view('projects.detail.index', compact([
            'project',
            'progressPlanStartDate',
            'progressPlanEndDate',
            'totalWeeks',
            'totalMonths',
            'progressStartDate',
            'progressEndDate',
            'totalWeeksProgress',
            'totalMonthsProgress',
            'lastProgressDate',
        ]));
    }

    public function editProject($id) {
        $project = Project::with(['steps', 'steps.substeps', 'steps.substeps.progress_plans'])->findOrFail($id);
        $projectTypes = ProjectType::get();
        $employees = Employee::get();
        return view('projects.edit-project', compact(['project', 'projectTypes', 'employees']));
    }

    public function deleteProgress($id, $progress_id)
    {
        $progress = Progress::findOrFail($progress_id)->delete();
        return redirect("projects/{$id}/progress");
    }

    public function storeProgress(Request $request, $id)
    {
        $substep = ProjectSubStep::findOrFail($request->get('project_substep_id'));
        $progressDate = Carbon::createFromFormat('Y-m-d', $request->get('progress_date'));
        $progress = new Progress([
            'project_substep_id' => $substep->project_substep_id,
            'project_step_id' => $substep->step->project_step_id,
            'project_id' => $substep->project->project_id,
            'week' => $request->get('week'),
            'progress_add' => $request->get('progress_add'),
            'progress_desc' => $request->get('progress_desc'),
            'progress_date' => $progressDate,
        ]);
        try {
            DB::beginTransaction();
            if (!$substep->real_start_date) {
                $substep->real_start_date = $progressDate;
                $substep->save();
            }
            $substep->progresses()->save($progress);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect("projects/{$id}/progress");
    }

    public function updateProgress(Request $request, $id)
    {
        $progress = Progress::findOrFail($request->get('progress_id'));
        $progressDate = Carbon::createFromFormat('Y-m-d', $request->get('progress_date'));
        $progress->project_substep_id = $request->get('project_substep_id');
        $progress->week = $request->get('week');
        $progress->progress_add = $request->get('progress_add');
        $progress->progress_desc = $request->get('progress_desc');
        $progress->progress_date = $progressDate;
        $progress->save();

        return redirect("projects/{$id}/progress");
    }

    public function showFinance(Request $request, $id)
    {
        $dateFrom = $request->get('date-from', null);
        $dateTo = $request->get('date-to', null);

        if ($dateFrom && $dateTo) {
            $dateFrom = Carbon::createFromFormat('Y-m-d', $dateFrom)->startOfDay();
            $dateTo = Carbon::createFromFormat('Y-m-d', $dateTo)->endOfDay();
            $data = Project::findOrFail($id)->cost_report_office()->whereBetween('cost_report_office_date', [$dateFrom, $dateTo])->orderBy('cost_report_office_id', 'asc')->get();
        } else {
            $data = Project::findOrFail($id)->cost_report_office()->orderBy('cost_report_office_id', 'desc')->get();
        }
        return view('projects.detail.index', compact(['data']));
    }

    public function storeFinance(Request $request, $id)
    {
        $last = Project::findOrFail($id)->cost_report_office()->orderBy('cost_report_office_id', 'desc')->first();
        $balance = 0;
        $cashflow =  (bool) $request->get('cashflow');
        $cost_expense = $request->get('cost_expense');
        if ($last) {
            $balance = $last->balance;
        }
        if ($cashflow)
            $balance += $cost_expense;
        else
            $balance -= $cost_expense;
        $cro = new CostReportOffice([
            'project_id' => $id,
            'balance' => $balance,
            'cost_expense' => $cost_expense,
            'cost_report_cashflow' => $cashflow,
            'cost_report_office_desc' => $request->get('desc'),
            'cost_report_office_date' => Carbon::createFromFormat('Y-m-d', $request->get('date')),
        ]);
        Project::findOrFail($id)->cost_report_office()->save($cro);
        return redirect("projects/{$id}/keuangan");
    }

    public function showFinanceRealtime(Request $request, $id)
    {
        $dateFrom = $request->get('date-from', null);
        $dateTo = $request->get('date-to', null);

        if ($dateFrom && $dateTo) {
            $dateFrom = Carbon::createFromFormat('Y-m-d', $dateFrom)->startOfDay();
            $dateTo = Carbon::createFromFormat('Y-m-d', $dateTo)->endOfDay();
            $data = Project::findOrFail($id)->cost_report_realtime()->whereBetween('cost_report_realtime_date', [$dateFrom, $dateTo])->orderBy('cost_report_realtime_id', 'asc')->get();
        } else {
            $data = Project::findOrFail($id)->cost_report_realtime()->orderBy('cost_report_realtime_id', 'desc')->get();
        }
        return view('projects.detail.index', compact(['data']));
    }

    public function storeFinanceRealtime(Request $request, $id)
    {
        $last = Project::findOrFail($id)->cost_report_realtime()->orderBy('cost_report_realtime_id', 'desc')->first();
        $balance = 0;
        $cashflow =  (bool) $request->get('cashflow');
        $cost_expense = $request->get('cost_expense');
        if ($last) {
            $balance = $last->balance;
        }
        if ($cashflow)
            $balance += $cost_expense;
        else
            $balance -= $cost_expense;
        $cro = new CostReportRealtime([
            'project_id' => $id,
            'balance' => $balance,
            'cost_expense' => $cost_expense,
            'cost_report_cashflow' => $cashflow,
            'cost_report_realtime_desc' => $request->get('desc'),
            'cost_report_realtime_date' => Carbon::createFromFormat('Y-m-d', $request->get('date')),
        ]);
        Project::findOrFail($id)->cost_report_realtime()->save($cro);
        return redirect("projects/{$id}/keuangan-nyata");
    }

    public function showMaterial(Request $request, $id)
    {
        $dateFrom = $request->get('date-from', null);
        $dateTo = $request->get('date-to', null);

        if ($dateFrom && $dateTo) {
            $dateFrom = Carbon::createFromFormat('Y-m-d', $dateFrom)->startOfDay();
            $dateTo = Carbon::createFromFormat('Y-m-d', $dateTo)->endOfDay();
            $data = Project::findOrFail($id)->material_report()->whereBetween('material_report_date', [$dateFrom, $dateTo])->orderBy('material_report_id', 'asc')->get();
        } else {
            $data = Project::findOrFail($id)->material_report()->orderBy('material_report_id', 'asc')->get();
        }
        $materialTypes = MaterialType::get();
        $materialUnits = MaterialUnit::get();
        return view('projects.detail.index', compact(['data', 'materialTypes', 'materialUnits']));
    }

    public function storeMaterial(Request $request, $id)
    {
        $material_report_date = Carbon::createFromFormat('Y-m-d', $request->get('material_report_date'));
        $material_type = MaterialType::findOrFail($request->get('material_type_id'));
        $splited_material_type_name = explode(' ', $material_type->material_type_name);
        $initial_material_type_name = '';
        foreach ($splited_material_type_name as $val) {
            $initial_material_type_name .= $val[0];
        }
        $initial_material_type_name = strtoupper($initial_material_type_name);
        $material_type_name = $initial_material_type_name . '-';
        $number = 1;
        $last = Project::findOrFail($id)->material_report()->where('material_code', 'like', $material_type_name. '%')->orderBy('material_report_id', 'desc')->first();
        if ($last) {
            $number = ((int)(explode('-', $last->material_code)[1])) + 1;
        }
        $material_code = $material_type_name . str_pad((string)$number, 3, '0', STR_PAD_LEFT);
        $mr = new MaterialReport([
            'project_id' => $id,
            'material_type_id' => $material_type->material_type_id,
            'material_unit_id' => $request->get('material_unit_id'),
            'material_code' => $material_code,
            'material_report_date' => $material_report_date,
            'material_name' => $request->get('material_name'),
            'material_cost_unit' => $request->get('material_cost_unit'),
            'material_qty' => $request->get('material_qty'),
            'material_desc' => $request->get('material_desc'),
        ]);
        Project::findOrFail($id)->material_report()->save($mr);
        return redirect("projects/{$id}/laporan-material");
    }

    public function showAdditionalDocument($id)
    {
        $supportingDocuments = Project::findOrFail($id)->supporting_documents;
        return view('projects.detail.index', compact(['supportingDocuments']));
    }

    public function storeAdditionalDocument(Request $request, $id)
    {
        $path = $request->file('supporting_document_path')->store('public/supporting-document');
        $date = Carbon::createFromFormat('Y-m-d', $request->get('supporting_document_upload_date'));
        $sp = new SupportingDocument([
            'project_id' => $id,
            'supporting_document_name' => $request->get('supporting_document_name'),
            'supporting_document_path' => $path,
            'supporting_document_upload_date' => $date,
        ]);
        Project::findOrFail($id)->supporting_documents()->save($sp);
        return redirect("projects/{$id}/dokumen-pendukung");
    }

    public function deleteAdditionalDocument($id, $idSupportingDoc) {
        Project::findOrFail($id)->supporting_documents()->findOrFail($idSupportingDoc)->delete();
        return redirect("projects/{$id}/dokumen-pendukung");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addProject() {
        $projectTypes = ProjectType::get();
        $employees = Employee::get();
        return view('projects.add-project', compact(['projectTypes', 'employees']));
    }

    public function storeProject(Request $request) {
        try {
            DB::beginTransaction();
            $project = new Project(
                $request->only(['project_name',
                    'cost_total',
                    'project_type_id'])
            );
            $project->save();
            $project->employees()->attach($request->get('project_employees'));

            $projectStepName = $request->get('project_step_name');
            $countProjectStep = count($projectStepName);
            for ($iProjectStep = 0; $iProjectStep < $countProjectStep; $iProjectStep++) {
                $step = new ProjectStep([
                    'project_id' => $project->project_id,
                    'project_step_name' => $projectStepName[$iProjectStep]
                ]);
                $step->save();

                $projectSubstepName = $request->get('project_substep_name')[$iProjectStep];
                $estimatedStartDate = $request->get('estimated_start_date')[$iProjectStep];
                $estimatedEndDate = $request->get('estimated_end_date')[$iProjectStep];
                $countProjectSubstep = count($projectSubstepName);

                for ($iProjectSubstep = 0; $iProjectSubstep < $countProjectSubstep; $iProjectSubstep++) {
                    $subStep = new ProjectSubStep([
                        'project_id' => $project->project_id,
                        'project_step_id' => $step->project_step_id,
                        'project_substep_name' => $projectSubstepName[$iProjectSubstep],
                        'estimated_start_date' => Carbon::createFromFormat('Y-m-d', $estimatedStartDate[$iProjectSubstep]),
                        'estimated_end_date' => Carbon::createFromFormat('Y-m-d', $estimatedEndDate[$iProjectSubstep]),
                    ]);
                    $subStep->save();

                    $weeks = $request->get('week')[$iProjectStep][$iProjectSubstep];
                    $weights = $request->get('weight')[$iProjectStep][$iProjectSubstep];
                    $countWeeks = count($weeks);

                    for ($iWeek = 0; $iWeek < $countWeeks; $iWeek++) {
                        $progressPlan = new ProjectProgressPlan([
                            'project_id' => $project->project_id,
                            'project_step_id' => $step->project_step_id,
                            'project_substep_id' => $subStep->project_substep_id,
                            'week' => $weeks[$iWeek],
                            'weight' => $weights[$iWeek],
                        ]);
                        $progressPlan->save();
                    }

                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect("/projects/{$project->project_id}/progress");
    }
}
