<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutDirectors extends Controller
{
    public function index($locale){
        return view("$locale.aboutdirectors");
    }
}
