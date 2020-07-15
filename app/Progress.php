<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progress extends Model
{

    use SoftDeletes;

    protected $table = 'progress';
    protected $primaryKey = 'progress_id';

    protected $fillable = [
        'project_substep_id',
        'project_step_id',
        'project_id',
        'week',
        'progress_add',
        'progress_desc',
        'progress_date',
    ];

    protected $dates = [
        'progress_date',
    ];

    public function substep()
    {
        return $this->belongsTo(ProjectSubStep::class, 'project_substep_id','project_substep_id');
    }

}
