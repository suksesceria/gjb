<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'project';
    protected $primaryKey = 'project_id';

    public function project_type()
    {
        return $this->hasOne(ProjectType::class, 'project_type_id', 'project_type_id');
    }

}
