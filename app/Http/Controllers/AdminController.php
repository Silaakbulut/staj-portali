<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Gunluk;

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()
{
    $toplamKullanici = User::count();

    $toplamAdmin = User::where('role', 'admin')->count();

    $toplamOgrenci = User::where('role', 'ogrenci')->count();

    $toplamGunluk = Gunluk::count();

    $sonGunlukler = Gunluk::with('user')
        ->latest()
        ->take(5)
        ->get();

    return view('admin.index', compact(
        'toplamKullanici',
        'toplamAdmin',
        'toplamOgrenci',
        'toplamGunluk',
        'sonGunlukler'
    ));
}
public function ogrenciler()
{
    $ogrenciler = User::where('role', 'ogrenci')
    ->paginate(10);

    return view('admin.ogrenciler', compact('ogrenciler'));
}
public function ogrenciDetay(User $user)
{
    $gunlukler = $user->gunlukler;

    return view('admin.ogrenci-detay', compact('user', 'gunlukler'));
}
}
