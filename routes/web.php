<?php

use App\Http\Controllers\AboutDirectors;
use App\Http\Controllers\History;
use App\Http\Controllers\Introduction;
use App\Http\Controllers\Login;
use App\Http\Controllers\Methodology;
use App\Http\Controllers\RequestAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/es');
});
Route::prefix('{locale}')
    ->where(['locale' => 'en|es|fr'])
    ->group(function () {
        Route::get('/', [Introduction::class, "index"])->name('introduction');
        Route::get('/about-directors', [AboutDirectors::class, "index"])->name('about-directors');
        Route::get('/methodology', [Methodology::class, "index"])->name('methodology');
        Route::get('/history', [History::class, "index"])->name('history');
        Route::get('/login', [Login::class, "index"])->name('login');
        Route::get('/request-access', [RequestAccess::class, "index"])->name('request');
    });
