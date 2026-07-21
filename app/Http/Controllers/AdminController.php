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
public function gunlukler()
{
    $gunlukler = Gunluk::with('user')
        ->latest()
        ->paginate(10);

    return view('admin.gunlukler', compact('gunlukler'));
}
public function gunlukDetay(Gunluk $gunluk)
{
    return view('admin.gunluk-detay', compact('gunluk'));
}
public function ogrenciSil(User $user)

{
    if ($user->id == auth()->id()) {
    return back()->with('error', 'Kendi hesabınızı silemezsiniz.');
}

    if ($user->role == 'admin') {
        return back()->with('error', 'Admin kullanıcısı silinemez.');
    }

 $user->delete();

    return back()->with('success', 'Öğrenci başarıyla silindi.');
}
public function gunlukSil(Gunluk $gunluk)
{
    $gunluk->delete();
    

    return back()->with('success', 'Günlük başarıyla silindi.');
}
}
