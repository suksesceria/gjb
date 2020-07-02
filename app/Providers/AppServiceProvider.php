<?php

namespace App\Providers;

use App\Employee;
use App\MaterialType;
use App\MaterialUnit;
use App\Menu;
use App\Observers\EmployeeObserver;
use App\Observers\MaterialTypeObserver;
use App\Observers\MaterialUnitObserver;
use App\Observers\MenuObserver;
use App\Observers\ProjectTypeObserver;
use App\Observers\RoleAccessObserver;
use App\Observers\RoleObserver;
use App\ProjectType;
use App\Role;
use App\RoleAccess;
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
        Menu::observe(MenuObserver::class);
        ProjectType::observe(ProjectTypeObserver::class);
        RoleAccess::observe(RoleAccessObserver::class);
        MaterialType::observe(MaterialTypeObserver::class);
        MaterialUnit::observe(MaterialUnitObserver::class);
    }
}
