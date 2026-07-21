@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    {{-- Başlık --}}
    <div class="mb-5">

        <h2 class="fw-bold text-bordo">

            <i class="bi bi-person-circle"></i>

            Profilim

        </h2>

        <p class="text-secondary">

            Hesap bilgilerini ve staj bilgilerini buradan yönetebilirsin.

        </p>

    </div>


    <div class="row">

        {{-- SOL TARAF --}}
        <div class="col-lg-4 mb-4">

            <div class="card dashboard-card">

                <div class="card-top"></div>

                <div class="card-body text-center py-5">

                   <div class="profile-avatar">

    @if($kullanici->profil_fotografi)

        <img src="{{ asset('storage/profil/'.$kullanici->profil_fotografi) }}"
             width="120"
             height="120"
             style="border-radius:50%; object-fit:cover;">

    @else

        <i class="bi bi-person-fill"></i>

    @endif

</div>

                    <h3 class="mt-4 text-bordo">

                        {{ $kullanici->name }}

                    </h3>

                    <p class="text-secondary">

                        {{ $kullanici->email }}

                    </p>

                    <hr>

                    <p class="mb-1">

                        <strong>Kayıt Tarihi</strong>

                    </p>
                    <h2>Profil Bilgileri</h2>

<p>
    Ad Soyad:
    {{ $kullanici->name }}
</p>

<p>
    E-posta:
    {{ $kullanici->email }}
</p>

<p>
    Kayıt Tarihi:
    {{ $kullanici->created_at }}
</p>

<h5 class="mt-4 text-bordo">
    Profil Fotoğrafı
</h5>


<form action="{{ route('profil.fotograf') }}" 
method="POST" 
enctype="multipart/form-data">

    @csrf

    <input 
        type="file" 
        name="profil_fotografi"
        class="form-control mb-3">


    <button class="btn btn-primary">

        <i class="bi bi-upload"></i>

        Fotoğraf Yükle

    </button>

</form>

                    <span class="text-secondary">

                        {{ $kullanici->created_at->format('d.m.Y') }}

                    </span>

                </div>

            </div>

        </div>



        {{-- SAĞ TARAF --}}
        <div class="col-lg-8">

            {{-- Profil Bilgileri --}}
            <div class="card dashboard-card mb-4">

                <div class="card-top"></div>

                <div class="card-body">

                    <h4 class="text-bordo mb-4">

                        <i class="bi bi-pencil-square"></i>

                        Kişisel Bilgiler

                    </h4>

                    <form action="/profil" method="POST">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">

                                Ad Soyad

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{ $kullanici->name }}">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                E-Posta

                            </label>

                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                value="{{ $kullanici->email }}">

                        </div>

                        <button class="btn btn-primary">

                            <i class="bi bi-check-circle"></i>

                            Bilgileri Güncelle

                        </button>

                    </form>

                </div>

            </div>



            {{-- STAJ --}}
            <div class="card dashboard-card mb-4">

                <div class="card-top"></div>

                <div class="card-body">

                    <h4 class="text-bordo mb-4">

                        <i class="bi bi-calendar-check"></i>

                        Staj Bilgileri

                    </h4>

                    <form action="{{ route('profil.staj') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Başlangıç Tarihi

                                </label>

                                <input
                                    type="date"
                                    class="form-control"
                                    name="baslangic_tarihi"
                                    value="{{ $kullanici->staj->baslangic_tarihi ?? '' }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Bitiş Tarihi

                                </label>

                                <input
                                    type="date"
                                    class="form-control"
                                    name="bitis_tarihi"
                                    value="{{ $kullanici->staj->bitis_tarihi ?? '' }}">

                            </div>

                        </div>

                        <button class="btn btn-primary">

                            <i class="bi bi-save"></i>

                            Staj Bilgilerini Kaydet

                        </button>

                    </form>

                </div>

            </div>



            {{-- Şifre --}}
            <div class="card dashboard-card">

                <div class="card-top"></div>

                <div class="card-body">

                    <h4 class="text-bordo mb-4">

                        <i class="bi bi-shield-lock"></i>

                        Şifre Değiştir

                    </h4>

                    <form>

                        <div class="mb-3">

                            <label class="form-label">

                                Mevcut Şifre

                            </label>

                            <input
                                type="password"
                                class="form-control"
                                name="mevcut_sifre">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Yeni Şifre

                            </label>

                            <input
                                type="password"
                                class="form-control"
                                name="yeni_sifre">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                Yeni Şifre (Tekrar)

                            </label>

                            <input
                                type="password"
                                class="form-control"
                                name="yeni_sifre_confirmation">

                        </div>

                        <button class="btn btn-primary">

                            <i class="bi bi-key"></i>

                            Şifreyi Güncelle

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection