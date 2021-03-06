<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $key => $datum) {
            $menu = new Menu($datum);
            $menu->save();
        }
    }

    protected function getData()
    {
        return [
            [
                'menu_code' => 'home-dashboard',
                'menu_name' => 'Beranda',
                'menu_link' => ''
            ],
            [
                'menu_code' => 'projects',
                'menu_name' => 'Proyek',
                'menu_link' => 'projects'
            ],
            [
                'menu_code' => 'type-proyek',
                'menu_name' => 'Tipe Proyek',
                'menu_link' => 'type-proyek'
            ],
            [
                'menu_code' => 'employees',
                'menu_name' => 'Karyawan',
                'menu_link' => 'employees'
            ],
            [
                'menu_code' => 'roles',
                'menu_name' => 'Akses Role',
                'menu_link' => 'roles'
            ],
            [
                'menu_code' => 'material-type',
                'menu_name' => 'Tipe Material',
                'menu_link' => 'material-type'
            ],
            [
                'menu_code' => 'material-unit',
                'menu_name' => 'Unit Material',
                'menu_link' => 'material-unit'
            ],
        ];
    }
}
