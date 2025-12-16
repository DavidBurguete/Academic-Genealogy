<?php

use App\Http\Controllers\AboutDirectors;
use App\Http\Controllers\Card;
use App\Http\Controllers\CreateAccount;
use App\Http\Controllers\History;
use App\Http\Controllers\Introduction;
use App\Http\Controllers\ListDoctors;
use App\Http\Controllers\Login;
use App\Http\Controllers\MakeSuggestion;
use App\Http\Controllers\Methodology;
use App\Http\Controllers\RequestAccess;
use App\Http\Controllers\Search;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/es');
});
Route::post('/suggest', [MakeSuggestion::class, 'index']);
Route::prefix('{locale}')
    ->where(['locale' => 'en|es|fr'])
    ->group(function () {
        Route::get('/', [Introduction::class, "show"])->name('introduction');
        Route::get('/about-directors', [AboutDirectors::class, "show"])->name('about-directors');
        Route::get('/methodology', [Methodology::class, "show"])->name('methodology');
        Route::get('/history', [History::class, "show"])->name('history');
        Route::get('/list', [ListDoctors::class, "index"])->name('list');
        Route::get('/card', [Card::class, "show"])->name('card');
        Route::get('/search', [Search::class, "index"])->name('search');

        Route::get('/login', [Login::class, "show"])->name('login');
        Route::get('/account', [Login::class, "index"])->name('account');
        Route::post('/account', [Login::class, "view"])->name('login');
        Route::get('/change-password', function($locale) { return redirect("$locale"); });
        Route::put('/change-password', [Login::class, "put"])->name('change-password');
        Route::get('/logout', [Login::class, "logout"])->name('login');

        Route::get('/create-account', [CreateAccount::class, "show"])->name('create-account');
        Route::get('/account-created', function($locale) { return redirect("$locale"); });
        Route::post('/account-created', [CreateAccount::class, "store"])->name('account-created');
        Route::get('/delete-account', function($locale) { return redirect("$locale"); });
        Route::post('/delete-account', [CreateAccount::class, "delete"])->name('delete-account');

        Route::get('/request-access', [RequestAccess::class, "show"])->name('request');
        Route::post('/request-access', [RequestAccess::class, "create"])->name('request');
    });
