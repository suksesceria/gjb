<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialReport extends Model
{
    use SoftDeletes;

    protected $table = 'material_report';
    protected $primaryKey = 'material_report_id';
}
