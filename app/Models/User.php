<?php

namespace App\Models;

Use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'lastName',
        'date',
        'route_img',
        'email',
        'ext',
        'user',
        'password',
        'active',
        'notes',
    ];
    //

    Use Notifiable;

    protected $guard = 'web';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'role_id',
        'route_img',
        'password',
        'active',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
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
     * Has one role
    */
    public function role()
    {
        $this->hasOne(Role::class);
    }
}
