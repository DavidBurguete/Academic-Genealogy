<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class History extends Controller
{
    public function show($locale){
        return view("$locale.history");
    }
}
