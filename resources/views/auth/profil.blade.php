<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
</head>
<body>

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
<h2>Profil Bilgileri</h2>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<form action="/profil" method="POST">

    @csrf

    <label>Ad Soyad</label><br>
    <input type="text" name="name" value="{{ $kullanici->name }}"><br><br>

    <label>E-posta</label><br>
    <input type="email" name="email" value="{{ $kullanici->email }}"><br><br>

    <button type="submit">Güncelle</button>

</form>
<hr>

<h3>Staj Bilgileri</h3>

<form action="{{ route('profil.staj') }}" method="POST">

    @csrf

    <div>
        <label>
            Staj Başlangıç Tarihi
        </label>

        <input 
            type="date"
            name="baslangic_tarihi"
            value="{{ $kullanici->staj->baslangic_tarihi ?? '' }}">
    </div>


    <br>


    <div>
        <label>
            Staj Bitiş Tarihi
        </label>

        <input 
            type="date"
            name="bitis_tarihi"
            value="{{ $kullanici->staj->bitis_tarihi ?? '' }}">
    </div>


    <br>


    <button type="submit">
        Staj Bilgilerini Kaydet
    </button>

</form>
<hr>

<h4>Şifre Değiştir</h4>

<div class="mb-3">
    <label>Mevcut Şifre</label>
    <input type="password" name="mevcut_sifre" class="form-control">
</div>

<div class="mb-3">
    <label>Yeni Şifre</label>
    <input type="password" name="yeni_sifre" class="form-control">
</div>

<div class="mb-3">
    <label>Yeni Şifre (Tekrar)</label>
    <input type="password" name="yeni_sifre_confirmation" class="form-control">
</div>

</body>
</html>