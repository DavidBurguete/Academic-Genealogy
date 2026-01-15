<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'relationtype',
    ];
}
