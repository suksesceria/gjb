<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialUnit extends Model
{
    use SoftDeletes;

    protected $table = 'material_unit';
    protected $primaryKey = 'material_unit_id';

    protected $fillable = [
        'material_unit_name'
    ];
}
