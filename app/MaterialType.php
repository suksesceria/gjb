<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialType extends Model
{
    use SoftDeletes;

    protected $table = 'material_type';
    protected $primaryKey = 'material_type_id';

    protected $fillable = [
        'material_type_name'
    ];

}
