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
    Route::post('/paket-data-post', [App\Http\Controllers\PaketDataController::class, 'post'])->name('data');

    // Route::get('/pln', [App\Http\Controllers\PlnController::class, 'index']);
    // Route::post('/pln-post', [App\Http\Controllers\PlnController::class, 'post'])->name('pln');

    Route::get('/pln', [App\Http\Controllers\PlnController::class, 'index']);
    Route::get('/customer', [App\Http\Controllers\PlnController::class, 'customer']);
    Route::get('/data_customer', [App\Http\Controllers\PlnController::class, 'data_customer']);
    Route::post('/post_customer', [App\Http\Controllers\PlnController::class, 'post_customer']);
    Route::post('/delete_customer', [App\Http\Controllers\PlnController::class, 'delete_customer']);
    Route::post('/pln-post', [App\Http\Controllers\PlnController::class, 'post'])->name('pln');

    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::patch('upload', [App\Http\Controllers\ProfileController::class, 'upload'])->name('profile.upload');
    Route::patch('password', [App\Http\Controllers\ProfileController::class, 'password'])->name('password');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/admin/home', [App\Http\Controllers\Admin\DashboardController::class, 'admin'])->name('admin.home');
        Route::get('/admin/data-pegawai', [App\Http\Controllers\Admin\DashboardController::class, 'pegawai'])->name('admin.pegawai');
        Route::get('/admin/data-outlet', [App\Http\Controllers\Admin\DashboardController::class, 'outlet'])->name('admin.outlet');
        Route::delete('/admin/{user}/destroy', [App\Http\Controllers\Admin\DashboardController::class, 'user_destroy'])->name('admin.user.destroy');
        Route::get('/admin/data-outlet/{user}', [App\Http\Controllers\Admin\DashboardController::class, 'user_edit'])->name('admin.outlet.edit');
        Route::put('/admin/{user}', [App\Http\Controllers\Admin\DashboardController::class, 'user_update'])->name('admin.outlet.update');
        // Route::delete('/admin/{id}/destroy', [App\Http\Controllers\Admin\DashboardController::class, 'riwayat_destroy'])->name('admin.riwayat.destroy');
    });

    Route::group(['middleware' => ['operator']], function () {
        // Route::get('/data-outlet', [App\Http\Controllers\Operator\DashboardController::class, 'outlet'])->name('operator.outlet');
        Route::get('/operator/data-saldo', [App\Http\Controllers\Operator\SaldoController::class, 'index'])->name('operator.saldo');
        Route::delete('/operator/{user}/destroy', [App\Http\Controllers\Operator\SaldoController::class, 'destroy'])->name('operator.saldo.destroy');
        Route::get('/operator/data-saldo/{user}', [App\Http\Controllers\Operator\SaldoController::class, 'edit'])->name('operator.saldo.edit');
        Route::put('/operator/{user}', [App\Http\Controllers\Operator\SaldoController::class, 'update'])->name('operator.saldo.update');
        Route::get('/operator/data-riwayat-isi-saldo', [App\Http\Controllers\Operator\RiwayatSaldoController::class, 'index'])->name('operator.riwayat');
        Route::get('/operator/data-riwayat-isi-saldo/{user}', [App\Http\Controllers\Operator\RiwayatSaldoController::class, 'edit'])->name('operator.riwayat.edit');
        // Route::resource('operator/data-riwayat-isi-saldo', App\Http\Controllers\Operator\RiwayatSaldoController::class);
    });
});
