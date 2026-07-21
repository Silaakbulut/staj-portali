@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Toplam Öğrenci</h6>
                    <h2>{{ $toplamOgrenci }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Toplam Günlük</h6>
                    <h2>{{ $toplamGunluk }}</h2>
                </div>
            </div>
        </div>

       

    </div>

    <h3 class="mt-5 mb-3">Son Eklenen Günlükler</h3>

    <div class="row">

        @forelse($sonGunlukler as $gunluk)

            <div class="col-md-6 mb-3">

                <div class="card shadow-sm h-100">

                    <div class="card-body">

                        <h5>{{ $gunluk->baslik }}</h5>

                        <p class="text-muted mb-2">
                            {{ Str::limit($gunluk->aciklama, 120) }}
                        </p>

                        <p class="mb-1">
                            <strong>Öğrenci:</strong>
                            {{ $gunluk->user->name }}
                        </p>

                        <small class="text-muted">
                            {{ $gunluk->tarih }}
                        </small>

                        <div class="mt-3">
                            <a href="{{ route('admin.gunluk.detay', $gunluk->id) }}" class="btn btn-primary btn-sm">
                                Detayı Gör
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-info">
                    Henüz günlük eklenmemiş.
                </div>
            </div>

        @endforelse

    </div>

</div>

@endsection