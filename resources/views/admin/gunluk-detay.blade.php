@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>
    {{ $gunluk->baslik }}
</h2>

<hr>

<p>
<strong>Öğrenci:</strong>
{{ $gunluk->user->name }}
</p>


<p>
<strong>Tarih:</strong>
{{ $gunluk->tarih }}
</p>


<p>
<strong>Açıklama:</strong>
</p>

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

@if($gunluk->dosya)

<p>
    <strong>Belge:</strong>

    <a href="{{ asset('storage/'.$gunluk->dosya) }}"
       target="_blank"
       class="btn btn-info btn-sm">

        Belgeyi Gör

    </a>
</p>

@endif


<a href="{{ route('admin.gunlukler') }}"
class="btn btn-secondary">

Geri Dön

</a>


</div>

@endsection