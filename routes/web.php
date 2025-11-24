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
        Route::get('/', [Introduction::class, "show"])->name('introduction');
        Route::get('/about-directors', [AboutDirectors::class, "show"])->name('about-directors');
        Route::get('/methodology', [Methodology::class, "show"])->name('methodology');
        Route::get('/history', [History::class, "show"])->name('history');
        Route::get('/login', [Login::class, "show"])->name('login');
        Route::get('/account', [Login::class, "index"])->name('account');
        Route::post('/account', [Login::class, "view"])->name('login');
        Route::put('/change-password', [Login::class, "put"])->name('change-password');
        Route::get('/logout', [Login::class, "logout"])->name('login');
        Route::get('/request-access', [RequestAccess::class, "show"])->name('request');
    });
