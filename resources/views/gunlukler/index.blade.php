@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    {{-- Sayfa Başlığı --}}
    <div class="card dashboard-card mb-4">

        <div class="card-top"></div>

        <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

            <div>

                <h2 class="text-bordo fw-bold mb-1">
                    <i class="bi bi-journal-richtext"></i>
                    Günlüklerim
                </h2>

                <p class="text-secondary mb-0">
                    Oluşturduğun tüm staj günlüklerini buradan yönetebilirsin.
                </p>

            </div>

            <a href="{{ route('gunlukler.create') }}"
               class="btn btn-primary mt-3 mt-md-0">

                <i class="bi bi-plus-circle"></i>

                Yeni Günlük

            </a>

        </div>

    </div>


    {{-- Arama --}}
    <div class="card dashboard-card mb-4">

        <div class="card-body">

            <form action="{{ route('gunlukler.index') }}" method="GET">

                <div class="input-group">

                    <span class="input-group-text bg-white">

                        <i class="bi bi-search"></i>

                    </span>

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

        </div>

    </div>


    @if($gunlukler->isEmpty())

        <div class="card dashboard-card">

            <div class="card-body text-center py-5">

                <i class="bi bi-journal-x display-2 text-secondary"></i>

                <h3 class="mt-4 text-bordo">

                    Henüz günlük eklenmedi

                </h3>

                <p class="text-secondary">

                    İlk staj gününü oluşturarak başlayabilirsin.

                </p>

                <a href="{{ route('gunlukler.create') }}"
                   class="btn btn-primary mt-3">

                    <i class="bi bi-plus-circle"></i>

                    İlk Günlüğü Oluştur

                </a>

            </div>

        </div>

    @else

        <div class="row">

            @foreach($gunlukler as $gunluk)

            <div class="col-lg-6 mb-4">

                <div class="card dashboard-card h-100">

                    <div class="card-top"></div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h4 class="text-bordo fw-bold mb-0">

                                {{ $gunluk->baslik }}

                            </h4>

                            <span class="badge bg-secondary">

                                {{ $gunluk->tarih }}

                            </span>

                        </div>

                        <hr>

                        <p class="text-secondary">

                            {{ $gunluk->aciklama }}

                        </p>

                        @if($gunluk->sorun)

                        <div class="mb-3">

                            <strong class="text-bordo">

                                <i class="bi bi-exclamation-circle"></i>

                                Sorun

                            </strong>

                            <p class="mb-0 text-secondary">

                                {{ $gunluk->sorun }}

                            </p>

                        </div>

                        @endif


                        @if($gunluk->cozum)

                        <div class="mb-3">

                            <strong class="text-bordo">

                                <i class="bi bi-check-circle"></i>

                                Çözüm

                            </strong>

                            <p class="mb-0 text-secondary">

                                {{ $gunluk->cozum }}

                            </p>

                        </div>

                        @endif


                        @if($gunluk->dosya)

                        <a href="{{ asset('storage/'.$gunluk->dosya) }}"
                           target="_blank"
                           class="btn btn-outline-secondary btn-sm mb-3">

                            <i class="bi bi-file-earmark-pdf"></i>

                            Belgeyi Gör

                        </a>

                        @endif

                    </div>

                    <div class="card-footer bg-white border-0 d-flex justify-content-between">

                        <a href="{{ route('gunlukler.edit',$gunluk->id) }}"
                           class="btn btn-primary">

                            <i class="bi bi-pencil-square"></i>

                            Düzenle

                        </a>

                        <form action="{{ route('gunlukler.destroy',$gunluk->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Bu günlüğü silmek istediğinize emin misiniz?')">

                                <i class="bi bi-trash"></i>

                                Sil

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        <div class="d-flex justify-content-center mt-4">

            {{ $gunlukler->links() }}

        </div>

    @endif

</div>

@endsection