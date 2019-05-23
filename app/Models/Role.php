<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role',
    ];

    protected $hidden = [
        'role'
    ];

    //Relationships
    /**
     * Belongs to a user
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
