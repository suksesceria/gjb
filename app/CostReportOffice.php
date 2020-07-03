<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostReportOffice extends Model
{
    use SoftDeletes;

    protected $table = 'cost_report_office';
    protected $primaryKey = 'cost_report_office_id';

    protected $dates = [
        'cost_report_office_date'
    ];

    protected $fillable = [
        'project_id',
        'cost_expense',
        'balance',
        'cost_report_cashflow',
        'cost_report_office_desc',
        'cost_report_office_date',
    ];

}
