<?php

namespace App\Http\Controllers;

use App\MaterialType;
use Illuminate\Http\Request;

class MaterialTypeController extends Controller
{

    public function index()
    {
        $data = MaterialType::get();
        return view("material-type.index", compact(['data']));
    }

    public function store(Request $request)
    {
        $model = new MaterialType($request->only(['material_type_name']));
        $model->save();
        return redirect('/material-type');
    }

    public function update(Request $request)
    {
        $model = MaterialType::findOrFail($request->get('material_type_id'));
        $model->update($request->only(['material_type_name']));
        return redirect('/material-type');
    }

    public function delete(Request $request)
    {
        $model = MaterialType::findOrFail($request->get('material_type_id'));
        $model->delete();
        return redirect('/material-type');
    }

}
