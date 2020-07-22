<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostReportRealtime extends Model
{
    use SoftDeletes;

    protected $table = 'cost_report_realtime';
    protected $primaryKey = 'cost_report_realtime_id';

    protected $dates = [
        'cost_report_realtime_date'
    ];

    protected $fillable = [
        'project_id',
        'cost_expense',
        'balance',
        'cost_report_cashflow',
        'cost_report_realtime_desc',
        'cost_report_realtime_date',
        'status',
        'verify_by_admin',
        'verify_at_admin',
    ];
}
