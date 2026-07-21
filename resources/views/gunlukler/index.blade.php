@extends('layouts.app')

@section('content')

<h2 class="mb-4">Günlüklerim</h2>

<form action="{{ route('gunlukler.index') }}" method="GET" class="mb-4">

    <div class="input-group">

        <input
            type="text"
            name="arama"
            class="form-control"
            placeholder="Başlığa göre ara..."
            value="{{ request('arama') }}">

        <button class="btn btn-primary">
            Ara
        </button>

    </div>

</form>

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

                <h2>
                    {{ $gunluk->baslik }}
                </h2>

                <p>
                    <strong>Tarih:</strong>
                    {{ $gunluk->tarih }}
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
    </p>

    <a href="{{ asset('storage/'.$gunluk->dosya) }}"
       target="_blank"
       class="btn btn-info mb-3">

        📄 Belgeyi Gör

    </a>

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

                    <button 
    type="submit" 
    class="btn btn-danger"
    onclick="return confirm('Bu günlüğü silmek istediğinize emin misiniz?')">

    Sil

</button>
                    

                </form>


            </div>

        </div>

    @endforeach

<div class="d-flex justify-content-center mt-4">
    {{ $gunlukler->links() }}
</div>

@endif

@endsection