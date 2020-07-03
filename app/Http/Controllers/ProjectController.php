<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Project;
use App\ProjectType;
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
        return view('projects.detail.index');
    }

    public function showAdditionalDocument($id)
    {
        return view('projects.detail.index');
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
