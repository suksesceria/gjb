<?php

use App\Employee;
use App\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee([
            'employee_name' => 'Admin User',
            'employee_dob' => Carbon::createFromTimeString('1990-01-01 00:00:00'),
            'employee_username' => 'adminuser',
            'employee_password' => Hash::make('adminuser@gjb.com'),
            'employee_email' => 'adminuser@gjb.com',
            'employee_phone' => '08000000000',
            'role_id' => Role::first()->role_id
        ]);
        $employee->save();
    }
}
