<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'desc',
    ];

    /*protected $hidden = [
        'name',
        'desc',
    ];*/

    //Relationships
    /**
     * A department has many users, (Has Many)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
