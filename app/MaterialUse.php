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
        'material_report_id',
        'material_use_date',
        'stock',
        'material_cost_unit',
        'material_qty',
        'total',
        'residue',
        'desc',
        'status',
        'verify_by_admin',
        'verify_at_admin',
    ];

    public function material_report()
    {
        return $this->belongsTo(MaterialReport::class, 'material_report_id', 'material_report_id');
    }

}
