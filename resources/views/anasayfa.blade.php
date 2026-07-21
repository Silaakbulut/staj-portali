@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="mb-4">
        <h2>Hoş Geldin, {{ Auth::user()->name }} </h2>

    </div>
<div class="row mt-4">

    <div class="col-md-12">

        <div class="card">

            <div class="card-body">

                <h4>
                    📌 Staj Durumu
                </h4>


                @if($staj)

                    <p>
                        <strong>Başlangıç:</strong>
                        {{ $staj->baslangic_tarihi }}
                    </p>


                    <p>
                        <strong>Bitiş:</strong>
                        {{ $staj->bitis_tarihi }}
                    </p>


                    <hr>


                    <div class="row text-center">


                        <div class="col-md-3">
                            <h5>Toplam Gün</h5>
                            <h3>
                                {{ $toplamStajGunu }}
                            </h3>
                        </div>


                        <div class="col-md-3">
                            <h5>Tamamlanan</h5>
                            <h3>
                                {{ $tamamlananGun }}
                            </h3>
                        </div>


                        <div class="col-md-3">
                            <h5>Eksik</h5>
                            <h3>
                                {{ $eksikGun }}
                            </h3>
                        </div>


                        <div class="col-md-3">
                            <h5>İlerleme</h5>
                            <h3>
                                %{{ $yuzde }}
                            </h3>
                        </div>


                    </div>


                @else

                    <div class="alert alert-warning">

                        Henüz staj bilgilerinizi girmediniz.

                        <br>

                        Profil bölümünden staj tarihlerinizi ekleyebilirsiniz.

                    </div>

                @endif


            </div>

        </div>

    </div>

</div>
    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5>Toplam Günlük</h5>
                    <h2>{{ $toplamGunluk }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-4 mb-3">
        <h4>Hızlı İşlemler</h4>
    </div>

    <div class="d-flex gap-2 mb-5">
        <a href="{{ route('gunlukler.create') }}" class="btn btn-success">
            Yeni Günlük Ekle
        </a>

        <a href="{{ route('gunlukler.index') }}" class="btn btn-primary">
            Günlüklerim
        </a>

        <a href="/profil" class="btn btn-secondary">
            Profilim
        </a>
    </div>

    <h4 class="mb-3">Son Eklenen Günlükler</h4>

    @if($gunlukler->count())

        <div class="row">

            @foreach($gunlukler as $gunluk)

                <div class="col-md-6 mb-3">

                    <div class="card shadow-sm">

                        <div class="card-body">

                            <h5>{{ $gunluk->baslik }}</h5>

                            <p>
                                <p>{{ $gunluk->aciklama }}</p>
                            </p>

                            <small class="text-muted">
                                {{ $gunluk->tarih }}
                            </small>

                            <div class="mt-3">
                                <a href="{{ route('gunlukler.edit', $gunluk->id) }}" class="btn btn-warning btn-sm">
                                    Düzenle
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="alert alert-info">
            Henüz günlük eklemediniz.
        </div>

    @endif

</div>

@endsection