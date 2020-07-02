<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostReportOffice extends Model
{
    use SoftDeletes;

    protected $table = 'cost_report_office';
    protected $primaryKey = 'cost_report_office_id';

}
