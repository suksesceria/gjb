<?php

namespace App\Providers;

use App\CostReportOffice;
use App\CostReportRealtime;
use App\Employee;
use App\MaterialReport;
use App\MaterialType;
use App\MaterialUnit;
use App\Menu;
use App\Observers\CostReportOfficeObserver;
use App\Observers\CostReportRealtimeObserver;
use App\Observers\EmployeeObserver;
use App\Observers\MaterialReportObserver;
use App\Observers\MaterialTypeObserver;
use App\Observers\MaterialUnitObserver;
use App\Observers\MenuObserver;
use App\Observers\ProgressObserver;
use App\Observers\ProjectObserver;
use App\Observers\ProjectProgressPlanObserver;
use App\Observers\ProjectStepObserver;
use App\Observers\ProjectSubstepObserver;
use App\Observers\ProjectTypeObserver;
use App\Observers\RoleAccessObserver;
use App\Observers\RoleObserver;
use App\Observers\SupportingDocumentObserver;
use App\Progress;
use App\Project;
use App\ProjectProgressPlan;
use App\ProjectStep;
use App\ProjectSubStep;
use App\ProjectType;
use App\Role;
use App\RoleAccess;
use App\SupportingDocument;
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
        CostReportOffice::observe(CostReportOfficeObserver::class);
        CostReportRealtime::observe(CostReportRealtimeObserver::class);
        MaterialReport::observe(MaterialReportObserver::class);
        Progress::observe(ProgressObserver::class);
        Project::observe(ProjectObserver::class);
        ProjectProgressPlan::observe(ProjectProgressPlanObserver::class);
        ProjectStep::observe(ProjectStepObserver::class);
        ProjectSubStep::observe(ProjectSubstepObserver::class);
        SupportingDocument::observe(SupportingDocumentObserver::class);
    }
}
