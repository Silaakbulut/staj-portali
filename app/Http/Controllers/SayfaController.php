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
$tamamlananGun = 0;
$eksikGun = null;
$yuzde = null;
$eksikGunler = [];


   if($staj)
{

    $baslangic = Carbon::parse($staj->baslangic_tarihi);

    $bitis = Carbon::parse($staj->bitis_tarihi);

    $toplamStajGunu = $baslangic->diffInDays($bitis) + 1;

    $girilenTarihler = $user->gunlukler()
        ->pluck('tarih')
        ->map(function($tarih){

            return Carbon::parse($tarih)
                ->format('Y-m-d');

        });



    
    $tamamlananGun = $girilenTarihler->count();


    $eksikGun = $toplamStajGunu - $tamamlananGun;
    $donem = Carbon::parse($staj->baslangic_tarihi)
    ->daysUntil($staj->bitis_tarihi);


foreach($donem as $gun)
{

    $tarih = $gun->format('Y-m-d');


    if(!$girilenTarihler->contains($tarih))
    {
        $eksikGunler[] = $tarih;
    }

}

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
        'yuzde',
        'eksikGunler'

    ));
}
}