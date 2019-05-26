<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SubAdmin extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
