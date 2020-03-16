<?php

namespace App\Providers;

use App\Employee;
use App\Observers\EmployeeObserver;
use App\Observers\RoleObserver;
use App\Role;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Role::observe(RoleObserver::class);
        Employee::observe(EmployeeObserver::class);
    }
}
