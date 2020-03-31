<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        $menus = Menu::get();
        return view('role-access.index', compact(['roles', 'menus']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Role($request->only(['role_name', 'role_desc']));
        $model->save();
        $model->menus()->attach($request->get('menus'));
        return redirect('/roles');
    }

    public function update(Request $request)
    {
        $model = Role::findOrFail($request->get('role_id'));
        $model->role_name = $request->get('role_name');
        $model->role_desc = $request->get('role_desc');
        $model->save();

        $menus = collect($request->get('menus'));
        $current_menus = $model->menus->pluck('menu_id');

        $model->menus()->detach(
            $current_menus->diff($menus)
        );

        $model->menus()->attach(
            $menus->diff($current_menus)
        );

        return redirect('/roles');
    }

    public function destroy(Request $request)
    {
        $model = Role::findOrFail($request->get('role_id'));
        $model->delete();
        return redirect('/roles');
    }
}
