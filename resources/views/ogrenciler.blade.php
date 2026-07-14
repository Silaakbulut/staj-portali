<!DOCTYPE html>
<html>
<head>
    <title>Öğrenciler</title>
</head>
<body>

<h2>Öğrenci Listesi</h2>

@foreach($ogrenciler as $ogrenci)

<p>
Ad: {{ $ogrenci->ad }} <br>
Soyad: {{ $ogrenci->soyad }} <br>
Bölüm: {{ $ogrenci->bolum }} <br>
Yaş: {{ $ogrenci->yas }}
</p>

<hr>

@endforeach

</body>
</html>