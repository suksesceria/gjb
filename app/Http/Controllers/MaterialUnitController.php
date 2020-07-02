<?php

namespace App\Http\Controllers;

use App\MaterialUnit;
use Illuminate\Http\Request;

class MaterialUnitController extends Controller
{

    public function index()
    {
        $data = MaterialUnit::get();
        return view("material-unit.index", compact(['data']));
    }

    public function store(Request $request)
    {
        $model = new MaterialUnit($request->only(['material_unit_name']));
        $model->save();
        return redirect('/material-unit');
    }

    public function update(Request $request)
    {
        $model = MaterialUnit::findOrFail($request->get('material_unit_id'));
        $model->update($request->only(['material_unit_name']));
        return redirect('/material-unit');
    }

    public function delete(Request $request)
    {
        $model = MaterialUnit::findOrFail($request->get('material_unit_id'));
        $model->delete();
        return redirect('/material-unit');
    }

}
