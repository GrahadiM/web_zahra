<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth:web']], function () {

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('landingpage');

    Route::get('/pulsa', [App\Http\Controllers\PulsaController::class, 'index']);
    Route::post('/pulsa_post', [App\Http\Controllers\PulsaController::class, 'post'])->name('pulsa');

    Route::get('/paket-data', [App\Http\Controllers\PaketDataController::class, 'index']);
    Route::post('/paket-data-post', [App\Http\Controllers\PaketDataController::class, 'post'])->name('pulsa');

    Route::get('/pln', [App\Http\Controllers\PlnController::class, 'index']);
    Route::post('/pln-post', [App\Http\Controllers\PlnController::class, 'post'])->name('pulsa');


    Route::get('/pln', [App\Http\Controllers\PlnController::class, 'index']);
    Route::get('/customer', [App\Http\Controllers\PlnController::class, 'customer']);
    Route::get('/data_customer', [App\Http\Controllers\PlnController::class, 'data_customer']);
    Route::post('/post_customer', [App\Http\Controllers\PlnController::class, 'post_customer']);
    Route::post('/pln-post', [App\Http\Controllers\PlnController::class, 'post'])->name('pulsa');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');
    });

    Route::group(['middleware' => ['operator']], function () {
    });
});
