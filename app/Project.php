<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'project';
    protected $primaryKey = 'project_id';

    protected $fillable = [
        'project_name',
        'cost_total',
        'project_type_id'
    ];

    public function type()
    {
        return $this->hasOne(ProjectType::class, 'project_type_id', 'project_type_id');
    }

    public function employees()
    {
        return $this
            ->belongsToMany(
            Employee::class,
            'project_employees',
            'project_id',
            'employee_id')
            ->using(ProjectEmployee::class)
            ->whereNull('project_employees.deleted_at')
            ->withTimestamps();
    }

    public function steps()
    {
        return $this->hasMany(ProjectStep::class, 'project_id', 'project_id');
    }

    public function substeps()
    {
        return $this->hasMany(ProjectSubStep::class, 'project_id', 'project_id');
    }

    public function progress_plans()
    {
        return $this->hasMany(ProjectProgressPlan::class, 'project_id', 'project_id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'project_id', 'project_id');
    }

}
