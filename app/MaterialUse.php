<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialUse extends Model
{
    use SoftDeletes;

    protected $table = 'material_use';
    protected $primaryKey = 'material_use_id';

    protected $dates = [
        'material_use_date'
    ];

    protected $fillable = [
        'project_id',
        'material_type_id',
        'material_use_date',
        'material_name',
        'material_cost_unit',
        'material_qty',
        'material_desc',
        'status',
        'verify_by_admin',
        'verify_at_admin',
    ];

    public function type()
    {
        return $this->belongsTo(MaterialType::class, 'material_type_id', 'material_type_id');
    }

}
