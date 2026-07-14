<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register sayfasını açar
    public function register()
    {
        return view('auth.register');
    }

    // Form gönderildiğinde çalışır
  public function registerPost(Request $request)//request:kullanıcının gönderdiği verileri alır

{
    $request->validate([//kontrol et
        'name' => 'required|max:255',//required:boş bırakılamaz demedk
        'email' => 'required|email|unique:users,email',//e posta formatında olmalı ve bir kere girilen bir daha girilemez
        'password' => 'required|min:6',//en az altı karakter
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

   return redirect('/login')->with('success', 'Kayıt başarılı. Giriş yapabilirsiniz.');
}
public function login()
{
    return view('auth.login');

}
public function loginPost(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',]);

        if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
    ]))
    {
        return redirect('/AnaSayfa');
    }

    return back()->withErrors([
        'email' => 'E-posta veya şifre hatalı.'
    ]);
}
public function logout()
{
    Auth::logout();

    return redirect('/login');
}
public function profil()
{
    $kullanici = Auth::user();

    return view('auth.profil', compact('kullanici'));
}
public function profilGuncelle(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,' . Auth::id(),
    ]);

    $kullanici = Auth::user();

    $kullanici->name = $request->name;
    $kullanici->email = $request->email;

    $kullanici->save();

    return back()->with('success', 'Profil başarıyla güncellendi.');
}
}