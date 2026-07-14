<?php
use App\Http\Controllers\SayfaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/AnaSayfa',function(){
    return view('anasayfa');
});
Route::get('/hakkimizda', [SayfaController::class, 'hakkimizda']);

Route::get('/iletisim',function(){
    return view('iletisim');
});
Route::get('/staj',function(){
    return view('staj');

});

Route::get('/ogrenciler',[SayfaController::class,'ogrenciler']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerPost']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginPost']);