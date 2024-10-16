<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    protected $hidden = ['password'];
    protected $guard = 'Client';
        protected $fillable = [
        'fullname',
        'email',
        "company",
        'password'
    ];

}
