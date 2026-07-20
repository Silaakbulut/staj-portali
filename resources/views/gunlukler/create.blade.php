@extends('layouts.app')

@section('content')

<h2 class="mb-4">Günlüklerim</h2>

<a href="{{ route('gunlukler.create') }}" class="btn btn-success mb-3">
    + Yeni Günlük Ekle
</a>

<hr>

@if($gunlukler->isEmpty())

    <p>Henüz günlük eklemediniz.</p>

@else

    @foreach($gunlukler as $gunluk)

        <div class="card mb-3">

            <div class="card-body">

                <h4 class="card-title">
                    {{ $gunluk->baslik }}
                </h4>

                <p class="text-muted">
                    <strong>Tarih:</strong>
                    {{ $gunluk->tarih }}
                </p>

                <p class="card-text">
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

                <a href="{{ route('gunlukler.edit', $gunluk->id) }}"
                   class="btn btn-warning">
                    Düzenle
                </a>

                <form action="{{ route('gunlukler.destroy', $gunluk->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Sil
                    </button>

                </form>

            </div>

        </div>

    @endforeach

@endif

@endsection