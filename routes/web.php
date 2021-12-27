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

    Route::get('request-saldo', [App\Http\Controllers\RequestSaldoController::class, 'index'])->name('request-saldo.index');
    Route::get('request-saldo/filter', [App\Http\Controllers\Operator\RequestSaldoController::class, 'filter'])->name('request-saldo.filter');
    Route::post('post-request-saldo', [App\Http\Controllers\RequestSaldoController::class, 'create'])->name('request-saldo.create');

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/admin/home', [App\Http\Controllers\Admin\DashboardController::class, 'admin'])->name('admin.home');
        
        Route::get('/admin/data-pulsa', [App\Http\Controllers\Admin\PulsaController::class, 'index'])->name('admin.data-pulsa');
        Route::delete('/admin/data-pulsa/{id}/destroy', [App\Http\Controllers\Admin\PulsaController::class, 'destroy'])->name('admin.data-pulsa.destroy');
        Route::get('/admin/data-pulsa/harga/{id}', [App\Http\Controllers\Admin\PulsaController::class, 'editprice'])->name('admin.data-pulsa.editprice');
        Route::put('/admin/data-pulsa/harga/{id}', [App\Http\Controllers\Admin\PulsaController::class, 'updateprice'])->name('admin.data-pulsa.updateprice');
        Route::get('/admin/data-pulsa/provider/{id}', [App\Http\Controllers\Admin\PulsaController::class, 'editprovider'])->name('admin.data-pulsa.editprovider');
        Route::put('/admin/data-pulsa/provider/{id}', [App\Http\Controllers\Admin\PulsaController::class, 'updateprovider'])->name('admin.data-pulsa.updateprovider');
        
        Route::get('/admin/data-paket', [App\Http\Controllers\Admin\PaketDataController::class, 'index'])->name('admin.data-paket');
        Route::delete('/admin/data-paket/{id}/destroy', [App\Http\Controllers\Admin\PaketDataController::class, 'destroy'])->name('admin.data-paket.destroy');
        
        Route::get('/admin/data-pln', [App\Http\Controllers\Admin\PlnController::class, 'index'])->name('admin.data-pln');
        Route::delete('/admin/data-pln/{id}/destroy', [App\Http\Controllers\Admin\PlnController::class, 'destroy'])->name('admin.data-pln.destroy');
        
        // Route::resource('/setting-website', App\Http\Controllers\Admin\SettingWebsiteController::class);
        Route::get('/admin/setting-website', [App\Http\Controllers\SettingWebsiteController::class, 'index'])->name('admin.setting-website');
        Route::put('/admin/post-setting-website', [App\Http\Controllers\SettingWebsiteController::class, 'update'])->name('admin.setting-website.update');

        Route::get('/admin/data-pegawai', [App\Http\Controllers\Admin\DashboardController::class, 'pegawai'])->name('admin.pegawai');
        Route::get('/admin/add-pegawai', [App\Http\Controllers\Admin\DashboardController::class, 'addpegawai'])->name('admin.add.pegawai');
        Route::post('/admin/post-add-pegawai', [App\Http\Controllers\Admin\DashboardController::class, 'postpegawai'])->name('admin.post.pegawai');

        Route::get('/admin/data-outlet', [App\Http\Controllers\Admin\DashboardController::class, 'outlet'])->name('admin.outlet');
        Route::delete('/admin/{user}/destroy', [App\Http\Controllers\Admin\DashboardController::class, 'user_destroy'])->name('admin.user.destroy');
        Route::get('/admin/data-outlet/{user}', [App\Http\Controllers\Admin\DashboardController::class, 'user_edit'])->name('admin.outlet.edit');
        Route::put('/admin/{user}', [App\Http\Controllers\Admin\DashboardController::class, 'user_update'])->name('admin.outlet.update');
        // Route::delete('/admin/{id}/destroy', [App\Http\Controllers\Admin\DashboardController::class, 'riwayat_destroy'])->name('admin.riwayat.destroy');
    });

    Route::group(['middleware' => ['operator']], function () {

        // Route::get('/data-outlet', [App\Http\Controllers\Operator\DashboardController::class, 'outlet'])->name('operator.outlet');
        Route::get('/operator/data-saldo', [App\Http\Controllers\Operator\SaldoController::class, 'index'])->name('operator.saldo');
        Route::get('/operator/data-saldo/filter', [App\Http\Controllers\Operator\SaldoController::class, 'filter'])->name('operator.saldo.filter');
        Route::delete('/operator/{user}/destroy', [App\Http\Controllers\Operator\SaldoController::class, 'destroy'])->name('operator.saldo.destroy');
        Route::get('/operator/data-saldo/{user}', [App\Http\Controllers\Operator\SaldoController::class, 'edit'])->name('operator.saldo.edit');
        Route::put('/operator/{user}', [App\Http\Controllers\Operator\SaldoController::class, 'update'])->name('operator.saldo.update');
        Route::put('/operator/status/{id}', [App\Http\Controllers\Operator\SaldoController::class, 'updateStatus'])->name('operator.updateStatus');

        Route::get('/operator/data-riwayat-isi-saldo', [App\Http\Controllers\Operator\RiwayatSaldoController::class, 'index'])->name('operator.riwayat');
        Route::get('/operator/data-riwayat-isi-saldo/filter', [App\Http\Controllers\Operator\RiwayatSaldoController::class, 'filter'])->name('operator.riwayat.filter');
        Route::get('/operator/data-riwayat-isi-saldo/{user}', [App\Http\Controllers\Operator\RiwayatSaldoController::class, 'edit'])->name('operator.riwayat.edit');
        Route::get('/operator/print', [App\Http\Controllers\Operator\RiwayatSaldoController::class, 'print'])->name('operator.print');
        Route::get('/operator/print/filter', [App\Http\Controllers\Operator\RiwayatSaldoController::class, 'printFilter'])->name('operator.print.filter');
        
        Route::get('operator/request-saldo', [App\Http\Controllers\Operator\RequestSaldoController::class, 'index'])->name('operator.request-saldo.index');
        Route::get('operator/request-saldo/filter', [App\Http\Controllers\Operator\RequestSaldoController::class, 'filter'])->name('operator.request-saldo.filter');
        Route::get('operator/request-saldo/{id}/edit', [App\Http\Controllers\Operator\RequestSaldoController::class, 'edit'])->name('operator.request-saldo.edit');
        Route::put('operator/request-saldo/{id}', [App\Http\Controllers\Operator\RequestSaldoController::class, 'update'])->name('operator.request-saldo.update');
        Route::get('operator/request-saldo/{id}', [App\Http\Controllers\Operator\RequestSaldoController::class, 'show'])->name('operator.request-saldo.show');
    });

    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
