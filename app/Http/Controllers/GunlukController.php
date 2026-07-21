<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gunluk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GunlukController extends Controller
{
  public function index(Request $request)
{
    $query = Auth::user()->gunlukler();

    if ($request->filled('arama')) {
        $query->where('baslik', 'like', '%' . $request->arama . '%');
    }

    $gunlukler = $query
        ->latest()
        ->paginate(5)
        ->appends($request->query());

    return view('gunlukler.index', compact('gunlukler'));
}
public function create(){
    return view('gunlukler.create');
    }
  public function store(Request $request)
{
    $request->validate([
        'baslik' => 'required',
        'aciklama' => 'required',
        'tarih' => 'required',
        'dosya' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120'
    ]);

    $dosyaYolu = null;

    if ($request->hasFile('dosya')) {
        $dosyaYolu = $request->file('dosya')->store('gunlukler', 'public');
    }

    Auth::user()->gunlukler()->create([
        'baslik'   => $request->baslik,
        'aciklama' => $request->aciklama,
        'sorun'    => $request->sorun,
        'cozum'    => $request->cozum,
        'dosya'    => $dosyaYolu,
        'tarih'    => $request->tarih
    ]);

    return redirect()->route('gunlukler.index')
        ->with('success', 'Günlük başarıyla eklendi.');
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

    return redirect()->route('gunlukler.index')
    ->with('success', 'Günlük başarıyla güncellendi.');

 }
   public function destroy($id)
{
    $gunluk = Auth::user()
        ->gunlukler()
        ->findOrFail($id);

    $gunluk->delete();

    return redirect()->route('gunlukler.index')
    ->with('success', 'Günlük başarıyla silindi.');


}
}
