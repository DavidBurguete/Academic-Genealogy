<?php

use App\Http\Controllers\AboutDirectors;
use App\Http\Controllers\History;
use App\Http\Controllers\Introduction;
use App\Http\Controllers\Methodology;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/en');
});
Route::prefix('{locale}')
    ->where(['locale' => 'en|es|fr'])
    ->group(function () {
        Route::get('/', [Introduction::class, "index"])->name('introduction');
        Route::get('/about-directors', [AboutDirectors::class, "index"])->name('about-directors');
        Route::get('/methodology', [Methodology::class, "index"])->name('methodology');
        Route::get('/history', [History::class, "index"])->name('history');
    });
