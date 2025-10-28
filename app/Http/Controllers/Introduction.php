<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Introduction extends Controller
{
    public function index(){
        return view("introduction");
    }
}
