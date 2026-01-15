<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
}
