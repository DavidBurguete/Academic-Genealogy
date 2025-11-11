<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Methodology extends Controller
{
    public function index($locale){
        return view("$locale.methodology");
    }
}
