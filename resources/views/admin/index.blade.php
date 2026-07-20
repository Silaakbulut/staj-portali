@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4"> Admin Dashboard</h2>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Toplam Kullanıcı</h5>
                    <h2>{{ $toplamKullanici }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Toplam Öğrenci</h5>
                    <h2>{{ $toplamOgrenci }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Toplam Admin</h5>
                    <h2>{{ $toplamAdmin }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Toplam Günlük</h5>
                    <h2>{{ $toplamGunluk }}</h2>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
<hr>

<h3 class="mt-4">Son Eklenen Günlükler</h3>

<div class="row">

@foreach($sonGunlukler as $gunluk)

<div class="col-md-6 mb-3">

    <div class="card">

        <div class="card-body">

            <h5>
                {{ $gunluk->baslik }}
            </h5>

            <p>
                {{ $gunluk->aciklama }}
            </p>
            Evet, bir kısmını index.blade.php içine yazacağız ama önce küçük bir ayrım yapalım. 👍

Yaptığımız değişiklikler 3 farklı yerde olacak:

1) Gunluk.php (Model)

Dosya:

app/Models/Gunluk.php

Buraya ilişkiyi ekliyoruz:

public function user()
{
    return $this->belongsTo(User::class);
}

Çünkü diyoruz ki:

Bir günlük bir kullanıcıya aittir.

2) AdminController.php

Dosya:

app/Http/Controllers/AdminController.php

Şu kısmı bul:

$sonGunlukler = Gunluk::latest()
    ->take(5)
    ->get();

Bunu değiştir:

$sonGunlukler = Gunluk::with('user')
    ->latest()
    ->take(5)
    ->get();

Burada veriyi hazırlıyoruz.

Yani controller diyor ki:

"Bana son 5 günlüğü getir ama yanında yazan öğrencinin bilgisi de olsun."

3) admin/index.blade.php

Dosya:

resources/views/admin/index.blade.php

Buraya ekrana göstereceğimiz kısmı yazıyoruz.

Şu bölümde:

@foreach($sonGunlukler as $gunluk)

<div class="card">

    <div class="card-body">

        <h5>
            {{ $gunluk->baslik }}
        </h5>

        <p>
            {{ $gunluk->aciklama }}
        </p>

    </div>

</div>

@endforeach

Bunun içine öğrenci adını ekliyoruz:

<p>
    Öğrenci:
    {{ $gunluk->user->name }}
</p>

Yani sonuç:

<h5>
    {{ $gunluk->baslik }}
</h5>

<p>
    {{ $gunluk->aciklama }}
</p>

<p>
    Öğrenci:
    {{ $gunluk->user->name }}
</p>

 <small>
    Tarih:
    {{ $gunluk->tarih }}
 </small>

        </div>

    </div>

</div>

@endforeach

