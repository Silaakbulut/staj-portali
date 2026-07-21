<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function profilFotograf(Request $request)
    {
        $request->validate([
            'profil_fotografi' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        $user = Auth::user();


        if ($request->hasFile('profil_fotografi')) {

            $dosya = $request->file('profil_fotografi');

            $isim = time() . '.' . $dosya->getClientOriginalExtension();


            $dosya->storeAs(
                'profil',
                $isim,
                'public'
            );


            $user->update([
                'profil_fotografi' => $isim
            ]);
        }


        return back()->with('success', 'Profil fotoğrafı başarıyla güncellendi.');
    }
}