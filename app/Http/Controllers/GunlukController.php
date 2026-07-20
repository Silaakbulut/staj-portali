<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gunluk;

class GunlukController extends Controller
{
   public function index()
{
    $gunlukler = Auth::user()->gunlukler;

    return view('gunlukler.index', compact('gunlukler'));
}
public function create(){
    return view('gunlukler.create');
    }
   public function store(Request $request)//requestten gelen verileri alır ve doğrular.request formdan gelen bilgileri taşıyan,onları conrollera getiren nesne
{
    $request->validate([
        'baslik'=>'required',//required: alanın boş olamayacağını belirtir
        'aciklama'=>'required',
        'tarih'=>'required'
    ]);


    Auth::user()->gunlukler()->create([
        'baslik'=>$request->baslik,
        'aciklama'=>$request->aciklama,
        'sorun'=>$request->sorun,
        'cozum'=>$request->cozum,
        'tarih'=>$request->tarih
    ]);


    return redirect('/gunlukler');
}
 public function edit($id){
 $gunluk = Auth::user()->gunlukler()->findOrFail($id);

 return view('gunlukler.edit', compact('gunluk'));
 }
 public function update(Request $request, $id){
    
    $request->validate([
        'baslik'=>'required',
        'aciklama'=>'required',
        'tarih'=>'required'
    ]);

    $gunluk = Auth::user()->gunlukler()->findOrFail($id);
    $gunluk->update([
        'baslik'=>$request->baslik,
        'aciklama'=>$request->aciklama,
        'sorun'=>$request->sorun,
        'cozum'=>$request->cozum,
        'tarih'=>$request->tarih
    ]);

    return redirect()->route('gunlukler.index');

 }
   public function destroy($id)
{
    $gunluk = Auth::user()
        ->gunlukler()
        ->findOrFail($id);

    $gunluk->delete();

    return redirect()->route('gunlukler.index');


}
}
