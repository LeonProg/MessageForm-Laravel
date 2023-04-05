<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::controller(IndexController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', 'index')->name('home');
    });

    Route::get('/login', 'login')->name('login');
    Route::get('/registration', 'registration')->name('registration');


});

Route::controller(AuthController::class)->as('auth.')->group(function () {
    Route::post('/registration', 'registration')->name('registration');
    Route::post('/login', 'login')->name('login');
});

