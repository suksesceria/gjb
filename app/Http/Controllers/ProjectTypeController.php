<?php

namespace App\Http\Controllers;

use App\ProjectType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{

    public function index()
    {
        $project_types = ProjectType::get();
        return view("project-type.index", compact(['project_types']));
    }

    public function store(Request $request)
    {
        $model = new ProjectType($request->only(['project_type_name']));
        $model->save();
        return redirect('/type-proyek');
    }

    public function update(Request $request)
    {
        $model = ProjectType::findOrFail($request->get('project_type_id'));
        $model->update($request->only(['project_type_name']));
        return redirect('/type-proyek');
    }

    public function delete(Request $request)
    {
        $model = ProjectType::findOrFail($request->get('project_type_id'));
        $model->delete();
        return redirect('/type-proyek');
    }

}
