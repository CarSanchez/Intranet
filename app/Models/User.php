<?php

namespace App\Models;

Use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //

    Use Notifiable;

    protected $guard = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastName',
        'date',
        'route_img',
        'email',
        'ext',
        'user',
        'department_id',
        'password',
        'active',
        'role_id',
        'notes',
        'last_login',
        'ip_register',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'department_id',
        'route_img',
        'password',
        'active',
        'role_id',
        'last_login',
        'ip_register',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
        'last_login',
    ];

    /**
     * The attributes that are a type and convert to other type
     *
     * @var array
     */
    protected $casts = [
        'active' => 'int',
        'created_at' => 'datetime:Y-m-d',
    ];

    //Relationships
    /**
     * A user has a role or belongs to a role, Has Many(Inverse)
    */
    public function role() //<- role + _id == role_id
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Belongs to department, Has Many(Inverse)
    */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
