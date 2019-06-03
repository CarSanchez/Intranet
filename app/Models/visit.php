<?php

namespace App\Models;

Use Illuminate\Notifications\Notifiable;
Use Illuminate\Database\Eloquent\Model;

class visit extends Model
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
        'ip',
        'hits',
        'visit_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'ip',
        'hits',
        'visit_date',
    ];
}
