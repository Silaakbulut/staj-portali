@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')

<div class="container-fluid">

    
    <div class="card mb-4">

        <div class="card-top"></div>

        <div class="card-body">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <h2 class="fw-bold text-bordo mb-2">

                        Hoş Geldin, {{ Auth::user()->name }} 

                    </h2>

                    <p class="text-secondary mb-0">

                        Staj sürecini buradan takip edebilir, günlüklerini yönetebilir ve ilerleme durumunu görüntüleyebilirsin.

                    </p>

                </div>

                <div class="col-md-4 text-end">

                    <i class="bi bi-mortarboard-fill"
                       style="font-size:90px;color:#80002020;"></i>

                </div>

            </div>

        </div>

    </div>


@if($staj)

{{-- İSTATİSTİKLER --}}
<div class="row g-4 mb-5">

    <div class="col-lg col-md-6">

        <div class="card dashboard-card">

            <div class="card-top"></div>

            <div class="card-body">

                <i class="bi bi-calendar-check"></i>

                <h2>{{ $toplamStajGunu }}</h2>

                <p>Toplam Gün</p>

            </div>

        </div>

    </div>


    <div class="col-lg col-md-6">

        <div class="card dashboard-card">

            <div class="card-top"></div>

            <div class="card-body">

                <i class="bi bi-journal-check"></i>

                <h2>{{ $tamamlananGun }}</h2>

                <p>Tamamlanan</p>

            </div>

        </div>

    </div>


    <div class="col-lg col-md-6">

        <div class="card dashboard-card">

            <div class="card-top"></div>

            <div class="card-body">

                <i class="bi bi-exclamation-circle"></i>

                <h2>{{ $eksikGun }}</h2>

                <p>Eksik Gün</p>

            </div>

        </div>

    </div>


    <div class="col-lg col-md-6">

        <div class="card dashboard-card">

            <div class="card-top"></div>

            <div class="card-body">

                <i class="bi bi-graph-up-arrow"></i>

                <h2>%{{ $yuzde }}</h2>

                <p>İlerleme</p>

            </div>

        </div>

    </div>


    <div class="col-lg col-md-6">

        <div class="card dashboard-card">

            <div class="card-top"></div>

            <div class="card-body">

                <i class="bi bi-journal-text"></i>

                <h2>{{ $toplamGunluk }}</h2>

                <p>Toplam Günlük</p>

            </div>

        </div>

    </div>

</div>


{{-- STAJ DURUMU + HIZLI İŞLEMLER --}}
<div class="row mb-5">

<div class="col-lg-8">

<div class="card h-100">

<div class="card-top"></div>

<div class="card-body">

<h4 class="text-bordo fw-bold mb-4">

<i class="bi bi-bar-chart-line-fill"></i>

Staj İlerlemesi

</h4>

<div class="row mb-4">

<div class="col-md-6">

<strong>Başlangıç Tarihi</strong>

<p>{{ $staj->baslangic_tarihi }}</p>

</div>

<div class="col-md-6">

<strong>Bitiş Tarihi</strong>

<p>{{ $staj->bitis_tarihi }}</p>

</div>

</div>

<div class="progress mb-3">

<div class="progress-bar"

style="width:{{ $yuzde }}%;">

{{ $yuzde }}%

</div>

</div>

<div class="d-flex justify-content-between">

<small>0 Gün</small>

<small>{{ $toplamStajGunu }} Gün</small>

</div>

</div>

</div>

</div>


<div class="col-lg-4">

<div class="card h-100">

<div class="card-top"></div>

<div class="card-body">

<h4 class="text-bordo fw-bold mb-4">

⚡ Hızlı İşlemler

</h4>

<div class="d-grid gap-3">

<a href="{{ route('gunlukler.create') }}"

class="btn btn-primary">

<i class="bi bi-plus-circle"></i>

Yeni Günlük

</a>

<a href="{{ route('gunlukler.index') }}"

class="btn btn-secondary">

<i class="bi bi-journal-text"></i>

Günlüklerim

</a>

<a href="/profil"

class="btn btn-outline-secondary">

<i class="bi bi-person-circle"></i>

Profilim

</a>

</div>

</div>

</div>

</div>

</div>

@else

<div class="alert alert-warning">

Henüz staj tarihlerini girmedin.

Profil sayfasından başlangıç ve bitiş tarihlerini ekleyebilirsin.

</div>

@endif



{{-- SON GÜNLÜKLER --}}

<div class="d-flex justify-content-between align-items-center mb-4">

<h4 class="fw-bold text-bordo">

<i class="bi bi-clock-history"></i>

Son Günlükler

</h4>

<a href="{{ route('gunlukler.index') }}"

class="btn btn-primary">

Tümünü Gör

</a>

</div>


@if($gunlukler->count())

<div class="row">

@foreach($gunlukler as $gunluk)

<div class="col-lg-6 mb-4">

<div class="card h-100">

<div class="card-top"></div>

<div class="card-body">

<h5 class="fw-bold text-bordo">

{{ $gunluk->baslik }}

</h5>

<hr>

<p class="text-secondary">

{{ Str::limit($gunluk->aciklama,120) }}

</p>

</div>

<div class="card-footer bg-white border-0 d-flex justify-content-between">

<small>

<i class="bi bi-calendar3"></i>

{{ $gunluk->tarih }}

</small>

<a href="{{ route('gunlukler.edit',$gunluk->id) }}"

class="btn btn-primary btn-sm">

Düzenle

</a>

</div>

</div>

</div>

@endforeach

</div>

@else

<div class="card">

<div class="card-body text-center py-5">

<i class="bi bi-journal-x"

style="font-size:60px;color:#999;"></i>

<h5 class="mt-3">

Henüz günlük eklemediniz.

</h5>

<a href="{{ route('gunlukler.create') }}"

class="btn btn-primary mt-3">

İlk Günlüğü Oluştur

</a>

</div>

</div>

@endif

</div>

@endsection