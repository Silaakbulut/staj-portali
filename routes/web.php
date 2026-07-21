<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SayfaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GunlukController;
use App\Http\Controllers\AdminController;


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

        Route::get('/AnaSayfa', [SayfaController::class, 'anasayfa'])
        ->name('dashboard');

        Route::get('/profil', 'profil');

        Route::post('/profil', 'profilGuncelle');

        Route::post('/profil/staj',
        [AuthController::class,'stajGuncelle'])
        ->name('profil.staj');


        // Profil fotoğrafı
        Route::post('/profil/fotograf', 'profilFotograf')
        ->name('profil.fotograf');

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
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/gunlukler/{gunluk}', [AdminController::class, 'gunlukDetay'])
    ->name('admin.gunluk.detay');
        Route::get('/admin/gunlukler', [AdminController::class, 'gunlukler'])
    ->name('admin.gunlukler');
        Route::get('/admin/ogrenciler/{user}', [AdminController::class, 'ogrenciDetay'])
    ->name('admin.ogrenci.show');
        Route::get('/admin/ogrenciler', [AdminController::class, 'ogrenciler'])
    ->name('admin.ogrenciler');

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');
        Route::delete('/admin/ogrenciler/{user}', [AdminController::class, 'ogrenciSil'])
    ->name('admin.ogrenci.destroy');
    Route::delete('/admin/gunlukler/{gunluk}',
    [AdminController::class, 'gunlukSil'])
    ->name('admin.gunluk.destroy');

});
