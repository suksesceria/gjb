<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();
        $roles = Role::get();
        return view('employees.list', compact(['employees', 'roles']));
    }

    public function store(Request $request)
    {
        $model = new Employee(
            $request->only([
                'employee_name',
                'employee_username',
                'employee_email',
                'employee_phone',
                'role_id'
            ])
        );
        $model->employee_dob = Carbon::createFromFormat('Y-m-d', $request->get('employee_dob'));
        $model->employee_password = Hash::make($request->get('employee_password'));
        $model->save();

        return redirect('/employees');
    }

    public function update(Request $request)
    {
        $model = Employee::findOrFail($request->get('employee_id'));
        $model->employee_name = $request->get('employee_name');
        $model->employee_username = $request->get('employee_username');
        $model->employee_email = $request->get('employee_email');
        $model->employee_phone = $request->get('employee_phone');
        $model->role_id = $request->get('role_id');
        $model->employee_dob = Carbon::createFromFormat('Y-m-d', $request->get('employee_dob'));

        if ($request->get('employee_password') != '')
            $model->employee_password = Hash::make($request->get('employee_password'));

        $model->save();

        return redirect('/employees');
    }

    public function destroy(Request $request)
    {
        $model = Employee::findOrFail($request->get('employee_id'));
        $model->delete();
        return redirect('/employees');
    }
}
