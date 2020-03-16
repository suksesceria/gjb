<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role([
            'role_name' => 'Admin',
            'role_desc' => 'Admin can access all of the features'
        ]);
        $role->save();
    }
}
