<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SayfaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GunlukController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hakkimizda', [SayfaController::class, 'hakkimizda']);
Route::get('/iletisim', function () {
    return view('iletisim');
});
Route::get('/staj', function () {
    return view('staj');
});
Route::get('/ogrenciler', [SayfaController::class, 'ogrenciler']);




Route::controller(AuthController::class)
    ->middleware('guest')
    ->group(function () {

        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginPost');

        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'registerPost');

    });



Route::controller(AuthController::class)
    ->middleware('auth')
    ->group(function () {

        Route::post('/logout', 'logout')->name('logout');

        Route::get('/AnaSayfa', function () {
            return view('anasayfa');
        });

        Route::get('/profil', 'profil');
        Route::post('/profil', 'profilGuncelle');

    });




Route::prefix('gunlukler')
    ->name('gunlukler.')
    ->middleware('auth')
    ->controller(GunlukController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');

        
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');

    });