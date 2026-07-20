```blade
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Günlük Düzenle</title>
</head>
<body>

<h1>Günlüğü Düzenle</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('gunlukler.update', $gunluk->id) }}" method="POST">

    @csrf
    @method('PUT')

    <label for="baslik">Başlık</label><br>
    <input
        type="text"
        id="baslik"
        name="baslik"
        value="{{ old('baslik', $gunluk->baslik) }}">

    <br><br>

    <label for="aciklama">Açıklama</label><br>
    <textarea
        id="aciklama"
        name="aciklama"
        rows="5"
        cols="50">{{ old('aciklama', $gunluk->aciklama) }}</textarea>

    <br><br>

    <label for="sorun">Sorun</label><br>
    <textarea
        id="sorun"
        name="sorun"
        rows="4"
        cols="50">{{ old('sorun', $gunluk->sorun) }}</textarea>

    <br><br>

    <label for="cozum">Çözüm</label><br>
    <textarea
        id="cozum"
        name="cozum"
        rows="4"
        cols="50">{{ old('cozum', $gunluk->cozum) }}</textarea>

    <br><br>

    <label for="tarih">Tarih</label><br>
    <input
        type="date"
        id="tarih"
        name="tarih"
        value="{{ old('tarih', $gunluk->tarih) }}">

    <br><br>

    <button type="submit">
        Güncelle
    </button>

</form>

</body>
</html>

