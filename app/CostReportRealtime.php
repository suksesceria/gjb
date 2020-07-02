<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CostReportRealtime extends Model
{
    use SoftDeletes;

    protected $table = 'cost_report_realtime';
    protected $primaryKey = 'cost_report_realtime_id';
}
