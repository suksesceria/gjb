<?php

namespace App\Http\Controllers;

use App\CostReportOffice;
use App\Employee;
use App\Project;
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
        return view('projects.detail.index');
    }

    public function showFinance($id)
    {
        $data = CostReportOffice::orderBy('cost_report_office_id', 'desc')->get();
        return view('projects.detail.index', compact(['data']));
    }

    public function storeFinance(Request $request, $id)
    {
        $last = CostReportOffice::orderBy('cost_report_office_id', 'desc')->first();
        $balance = 0;
        $cashflow =  (bool) $request->get('cashflow');
        $cost_expense = $request->get('cost_expense');
        if ($last) {
            $balance = $last->balance;
            if ($cashflow)
                $balance += $cost_expense;
            else
                $balance -= $cost_expense;
        }
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
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect("/projects/{$project->project_id}/progress");
    }
}
