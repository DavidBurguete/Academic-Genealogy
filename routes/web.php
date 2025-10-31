<?php

use App\Http\Controllers\AboutDirectors;
use App\Http\Controllers\Introduction;
use App\Http\Controllers\Methodology;
use Illuminate\Support\Facades\Route;

Route::get('/', [Introduction::class, "index"]);
Route::get('/about-directors', [AboutDirectors::class, "index"]);
Route::get('/methodology', [Methodology::class, "index"]);