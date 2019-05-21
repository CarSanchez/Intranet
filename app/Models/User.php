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
        'password',
        'active',
        'role',
        'notes',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'route_img',
        'password',
        'active',
        'role',
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
}
