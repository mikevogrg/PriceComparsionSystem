<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'dob',
        'sex',
        'address',
        'job',
        'status',
        'salary',
        'marital',
        'cv'
    ];
}
