<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectType extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'project_type_id';

    protected $fillable = [
        'project_type_name'
    ];

}
