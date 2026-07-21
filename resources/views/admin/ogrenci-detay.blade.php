@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>
    {{ $user->name }}
</h2>

<div class="card mb-4">

    <div class="card-body">

        <p>
            <strong>Email:</strong>
            {{ $user->email }}
        </p>

        <p>
            <strong>Rol:</strong>
            {{ $user->role }}
        </p>

        <p>
            <strong>Toplam Günlük:</strong>
            {{ $gunlukler->count() }}
        </p>

    </div>

</div>


<hr>

<h3 class="mb-3">
    Yazdığı Günlükler
</h3>


@if($gunlukler->isEmpty())

    <div class="alert alert-info">
        Bu öğrenci henüz günlük yazmamış.
    </div>


@else


@foreach($gunlukler as $gunluk)

<div class="card mb-3">

    <div class="card-body">


        <h5>
            {{ $gunluk->baslik }}
        </h5>


        <p>
            {{ $gunluk->aciklama }}
        </p>


        @if($gunluk->sorun)

        <p>
            <strong>Sorun:</strong>
            {{ $gunluk->sorun }}
        </p>

        @endif



        @if($gunluk->cozum)

        <p>
            <strong>Çözüm:</strong>
            {{ $gunluk->cozum }}
        </p>

        @endif



        <p>
            <strong>Tarih:</strong>
            {{ $gunluk->tarih }}
        </p>



        @if($gunluk->dosya)

        <a href="{{ asset('storage/'.$gunluk->dosya) }}"
           target="_blank"
           class="btn btn-info btn-sm">

            📄 Belgeyi Gör

        </a>

        @endif



    </div>

</div>


@endforeach


@endif


</div>


@endsection