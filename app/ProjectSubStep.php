<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSubStep extends Model
{
    use SoftDeletes;

    protected $table = 'project_substep';
    protected $primaryKey = 'project_substep_id';

    protected $fillable = [
        'project_id',
        'project_step_id',
        'project_substep_name',
        'estimated_start_date',
        'estimated_end_date',
        'real_start_date',
    ];

    protected $dates = [
        'estimated_start_date',
        'estimated_end_date',
        'real_start_date',
    ];

    public function progress_plans()
    {
        return $this->hasMany(ProjectProgressPlan::class, 'project_substep_id', 'project_substep_id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'project_substep_id', 'project_substep_id');
    }
}
