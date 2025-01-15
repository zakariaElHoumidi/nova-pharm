<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrateur extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
