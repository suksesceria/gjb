<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialReport extends Model
{
    use SoftDeletes;

    protected $table = 'material_report';
    protected $primaryKey = 'material_report_id';

    protected $dates = [
        'material_report_date'
    ];

    protected $fillable = [
        'project_id',
        'material_type_id',
        'material_unit_id',
        'material_code',
        'material_report_date',
        'material_name',
        'material_cost_unit',
        'material_qty',
        'material_desc',
        'status',
        'verify_by_admin',
        'verify_at_admin',
    ];

    public function unit()
    {
        return $this->belongsTo(MaterialUnit::class, 'material_unit_id', 'material_unit_id');
    }

    public function type()
    {
        return $this->belongsTo(MaterialType::class, 'material_type_id', 'material_type_id');
    }

    public function material_use()
    {
        return $this->hasMany(MaterialUse::class, 'material_use_id', 'material_use_id');
    }

}
