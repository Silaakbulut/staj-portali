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

</body>
</html>