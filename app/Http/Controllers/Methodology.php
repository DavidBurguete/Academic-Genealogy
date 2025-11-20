<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Methodology extends Controller
{
    public function show($locale){
        return view("$locale.methodology");
    }
}
