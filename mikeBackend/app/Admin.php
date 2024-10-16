<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $hidden = ['password'];
    protected $guard = 'Admin';
        protected $fillable = [
        'fullname',
        'email',
        "company",
        'password'
    ];
}
