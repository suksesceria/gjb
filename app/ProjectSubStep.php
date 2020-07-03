<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSubStep extends Model
{
    use SoftDeletes;

    protected $table = 'project_substep';
    protected $primaryKey = 'project_substep_id';

    public function progress_plans()
    {
        return $this->hasMany(ProjectProgressPlan::class, 'project_substep_id', 'project_substep_id');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'project_substep_id', 'project_substep_id');
    }
}
