<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectEmployee extends Pivot
{
    protected $table = 'project_employees';

    protected $primaryKey = 'project_employee_id';
}
