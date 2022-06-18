<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return redirect('/series');
})->middleware(Authenticator::class);

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/criar', 'create')->name('series.create');
    Route::get('/series/editar/{series}', 'edit')->name('series.edit');

    Route::post('/series/salvar',  'store')->name('series.store');

    Route::delete('/series/excluir/{series}',  'destroy')->name('series.destroy');

    Route::put('/series/atualizar/{series}', 'update')->name('series.update');
});

Route::controller(SeasonsController::class)->group(function () {
    Route::get('/series/{series}/seasons', 'index')->name('seasons.index');
});

Route::controller(EpisodesController::class)->group(function () {
    Route::get('/seasons/{season}/episodes', 'index')->name('episodes.index');
    Route::post('/seasons/{season}/episodes', 'update')->name('episodes.update');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login.signin');
    Route::get('/logout', 'logOut')->name('login.logout');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users/create', 'store')->name('users.store');
});
