<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    const ADMIN = 'Admin';
    const OFFICE = 'Office';
    const PMO = 'Project Manager & Officer';

    protected $table = 'role';
    protected $primaryKey = 'role_id';

    protected $fillable = [
        'role_name',
        'role_desc'
    ];

    public function menus()
    {
        return $this
            ->belongsToMany(
                Menu::class,
                'role_access',
                'role_id',
                'menu_id')
            ->using(RoleAccess::class)
            ->whereNull('role_access.deleted_at')
            ->withTimestamps();
    }

}
