<!DOCTYPE html>
<html>
<head>
    <title>Hakkımızda</title>
</head>
<body>

<h1>Hakkımızda Sayfası</h1>

<p>Bu benim Laravel ile yaptığım ilk HTML sayfası.</p>
<h1>Öğrenciler</h1>
@foreach($ogrenciler as $ogrebnci)
<p>{{ $ogrebnci }}</p>
@endforeach
</body>
</html>