<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'menu_id';

    protected $fillable = [
        'menu_name',
        'menu_link'
    ];

}
