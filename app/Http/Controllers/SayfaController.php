<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SayfaController extends Controller
{
    public function anasayfa()
{
    $user = Auth::user();


    $gunlukler = $user->gunlukler()
        ->latest()
        ->take(5)
        ->get();


    $toplamGunluk = $user->gunlukler()->count();


    $staj = $user->staj;


    $toplamStajGunu = null;
    $tamamlananGun = $toplamGunluk;
    $eksikGun = null;
    $yuzde = null;


    if($staj)
    {

        $baslangic = Carbon::parse($staj->baslangic_tarihi);

        $bitis = Carbon::parse($staj->bitis_tarihi);


        $toplamStajGunu = $baslangic->diffInDays($bitis) + 1;


        $eksikGun = $toplamStajGunu - $tamamlananGun;


        if($toplamStajGunu > 0)
        {
            $yuzde = round(
                ($tamamlananGun / $toplamStajGunu) * 100
            );
        }

    }


    return view('anasayfa', compact(
        'gunlukler',
        'toplamGunluk',
        'staj',
        'toplamStajGunu',
        'tamamlananGun',
        'eksikGun',
        'yuzde'
    ));
}
}