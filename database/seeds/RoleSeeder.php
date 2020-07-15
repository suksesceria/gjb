<?php

use App\Menu;
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
        $role->menus()->attach(
            Menu::get()->pluck('menu_id')
        );

        $role = new Role([
            'role_name' => 'Office',
            'role_desc' => 'Office'
        ]);
        $role->save();
        $role->menus()->attach(
            Menu::whereIn('menu_code', ['home-dashboard', 'projects', 'type-proyek', 'material-type', 'material-unit'])->get()->pluck('menu_id')
        );

        $role = new Role([
            'role_name' => 'Projek Manajer',
            'role_desc' => 'Projek Manajer'
        ]);
        $role->save();
        $role->menus()->attach(
            Menu::whereIn('menu_code', ['home-dashboard', 'projects'])->get()->pluck('menu_id')
        );
    }

}
