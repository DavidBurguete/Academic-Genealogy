<?php

use App\Http\Controllers\Introduction;
use Illuminate\Support\Facades\Route;

Route::get('/', [Introduction::class, "index"]);
