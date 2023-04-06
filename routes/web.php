<?php

use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;





Route::controller(IndexController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', 'index')->name('home');
    });

    Route::get('/login', 'login')->name('login');
    Route::get('/registration', 'registration')->name('registration');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::controller(AdminIndexController::class)->group(function () {
        Route::get('/message', 'getMessage')->name('admin');
    });
});


Route::controller(AuthController::class)->as('auth.')->group(function () {
    Route::post('/auth/registration', 'registration')->name('registration');
    Route::post('/auth/login', 'login')->name('login');

    Route::middleware('auth')->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});

 Route::middleware('auth')->as('message.')->controller(MessageController::class)->group(function () {
    Route::post('/store', 'store')->name('store');
 });


