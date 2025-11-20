<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutDirectors extends Controller
{
    public function show($locale){
        return view("$locale.aboutdirectors");
    }
}
