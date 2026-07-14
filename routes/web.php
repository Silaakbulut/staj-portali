<?php

use App\Http\Controllers\SayfaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GunlukController;

Route::get('/', function () {return view('welcome');});

// Sayfalar
Route::get('/hakkimizda', [SayfaController::class, 'hakkimizda']);

Route::get('/iletisim', function () {
    return view('iletisim');});

Route::get('/staj', function () {
    return view('staj');});

Route::get('/ogrenciler', [SayfaController::class, 'ogrenciler']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerPost']);


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/AnaSayfa', function () {
    return view('anasayfa');
})->middleware('auth');
Route::get('/profil', [AuthController::class, 'profil'])->middleware('auth');
Route::post('/profil', [AuthController::class, 'profilGuncelle'])->middleware('auth');
Route::get('/gunlukler', [GunlukController::class, 'index']);
Route::get('/gunlukler/create', [GunlukController::class, 'create']);

Route::post('/gunlukler', [GunlukController::class, 'store']);
Route::get('/gunlukler/{id}/edit', [GunlukController::class, 'edit']);
Route::put('/gunlukler/{id}', [GunlukController::class, 'update']);
Route::delete('/gunlukler/{id}', [GunlukController::class, 'destroy']);