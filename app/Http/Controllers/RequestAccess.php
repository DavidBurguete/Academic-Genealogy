<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestAccess extends Controller
{
    public function index($locale) {
        return view("$locale.requestaccess");
    }
}
