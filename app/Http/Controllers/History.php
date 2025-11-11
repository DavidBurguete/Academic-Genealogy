<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class History extends Controller
{
    public function index($locale){
        return view("$locale.history");
    }
}
