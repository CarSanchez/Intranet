<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role',
        'desc',
    ];

    protected $hidden = [
        'role',
        'desc',
    ];

    //Relationships
    /**
     * A role has many users or belongs to many users, (Has Many)
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
