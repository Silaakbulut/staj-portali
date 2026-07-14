<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
</head>
<body>

    <h2>Kayıt Ol</h2>

    @if(session('success'))
        <p style="color:green;">
            {{ session('success') }}
        </p>
    @endif

    <form action="/register" method="POST">

        @csrf

        <label>Ad Soyad</label><br>
        <input type="text" name="name"><br><br>

        <label>E-posta</label><br>
        <input type="email" name="email"><br><br>

        <label>Şifre</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Kayıt Ol</button>

    </form>
@if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>