<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
</head>
<body>

    <h2>Giriş Yap</h2>

    {{-- Başarılı işlem mesajı --}}
    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    {{-- Hata mesajları --}}
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/login" method="POST">

        @csrf

        <label>E-posta</label><br>
        <input type="email" name="email"><br><br>

        <label>Şifre</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Giriş Yap</button>

    </form>

</body>
</html>