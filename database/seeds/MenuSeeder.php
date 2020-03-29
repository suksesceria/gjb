<?php

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

    }

    protected function getData()
    {
        return [
            [
                'menu_code' => 'home-dashboard',
                'menu_name' => 'Beranda',
                'menu_link' => '/'
            ],
            [
                'menu_code' => 'projects',
                'menu_name' => 'Proyek',
                'menu_link' => '/projects'
            ],
            [
                'menu_code' => 'type-proyek',
                'menu_name' => 'Tipe Proyek',
                'menu_link' => '/type-proyek'
            ],
            [
                'menu_code' => 'employees',
                'menu_name' => 'Karyawan',
                'menu_link' => '/employees'
            ],
            [
                'menu_code' => 'roles',
                'menu_name' => 'Akses Role',
                'menu_link' => '/roles'
            ],
        ];
    }
}
