<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectProgressPlan extends Model
{
    use SoftDeletes;

    protected $table = 'project_progress_plan';
    protected $primaryKey = 'project_progress_plan_id';

    protected $fillable = [
        'project_id',
        'project_step_id',
        'project_substep_id',
        'week',
        'weight',
    ];

}
