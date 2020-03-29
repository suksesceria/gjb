<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleAccess extends Model
{
    use SoftDeletes;

    protected $table = 'role_access';

    protected $primaryKey = 'role_access_id';

}
