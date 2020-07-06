<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectStep extends Model
{
    use SoftDeletes;

    protected $table = 'project_step';
    protected $primaryKey = 'project_step_id';

    protected $fillable = [
        'project_id',
        'project_step_name'
    ];

    public function substeps()
    {
        return $this->hasMany(ProjectSubStep::class, 'project_step_id', 'project_step_id');
    }

    public function progress_plans()
    {
        return $this->hasMany(ProjectProgressPlan::class, 'project_step_id', 'project_step_id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'project_step_id', 'project_step_id');
    }

}
