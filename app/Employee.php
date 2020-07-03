<?php


namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Support\Collection;

class Employee extends Authenticable
{
    use SoftDeletes;

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_name',
        'employee_dob',
        'employee_username',
        'employee_password',
        'employee_email',
        'employee_phone',
        'role_id',
    ];

    protected $dates = [
        'employee_dob'
    ];

    protected $casts = [
        'employee_dob' => 'datetime'
    ];

    protected $hidden = [
        'employee_password',
    ];

    public function getAuthPassword()
    {
        return $this->employee_password;
    }

    public function getEmailForPasswordReset()
    {
        return $this->employee_email;
    }

    public function getRememberTokenName()
    {
        return null;
    }

    public function hasVerifiedEmail()
    {
        return true;
    }

    public function markEmailAsVerified()
    {
        return true;
    }

    public function sendEmailVerificationNotification()
    {
        // nothing to dos
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'role_id', 'role_id');
    }

    public function projects()
    {
        if ($this->role()->where('role_name', Role::ADMIN)->count()) {
            return Project::query();
        } else {
            return
                $this->belongsToMany(
                    Project::class,
                    'project_employees',
                    'employee_id',
                    'project_id')
                ->using(ProjectEmployee::class)
                ->whereNull('project_employees.deleted_at')
                ->withTimestamps();
        }
    }

    public function getProjectsAttribute()
    {
        return $this->projects()->get();
    }

}
