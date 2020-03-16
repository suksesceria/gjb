<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'role';
    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_name',
        'role_desc'
    ];

}
