<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersRoles extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'user_id', 'role_id'
    ];
}
