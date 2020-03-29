<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleAccess extends Pivot
{
    use SoftDeletes;

    protected $table = 'role_access';

    protected $primaryKey = 'role_access_id';

}
