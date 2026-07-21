<!DOCTYPE html>
<html lang="tr">

<head>

<meta charset="UTF-8">

<title>Kayıt Ol | Staj Portalı</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{

    background:#f7f2f3;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

}


.register-card{

    width:450px;

    border:none;

    border-radius:20px;

    box-shadow:0 10px 30px rgba(0,0,0,.15);

}


.card-top{

    height:8px;

    background:#800020;

    border-radius:20px 20px 0 0;

}


.logo{

    font-size:60px;

    color:#800020;

}


.btn-register{

    background:#800020;

    color:white;

    border:none;

}


.btn-register:hover{

    background:#5c0018;

    color:white;

}


</style>


</head>



<body>


<div class="card register-card">


<div class="card-top"></div>


<div class="card-body p-5">


<div class="text-center">


<div class="logo">

<i class="bi bi-person-plus-fill"></i>

</div>


<h2 class="mb-4">

Staj Portalı

</h2>


<p class="text-secondary">

Yeni hesap oluştur

</p>


</div>



@if($errors->any())

<div class="alert alert-danger">

@foreach($errors->all() as $error)

<p class="mb-0">
{{ $error }}
</p>

@endforeach

</div>

@endif



<form action="/register" method="POST">


@csrf



<div class="mb-3">


<label class="form-label">

Ad Soyad

</label>


<input 
type="text"
name="name"
class="form-control"
placeholder="Ad Soyad"
value="{{ old('name') }}">


</div>




<div class="mb-3">


<label class="form-label">

E-posta

</label>


<input 
type="email"
name="email"
class="form-control"
placeholder="E-posta"
value="{{ old('email') }}">


</div>





<div class="mb-3">


<label class="form-label">

Şifre

</label>


<input 
type="password"
name="password"
class="form-control"
placeholder="Şifre">


</div>





<div class="mb-4">


<label class="form-label">

Şifre Tekrar

</label>


<input 
type="password"
name="password_confirmation"
class="form-control"
placeholder="Şifre tekrar">


</div>





<button class="btn btn-register w-100">

<i class="bi bi-person-check"></i>

Kayıt Ol

</button>




<p class="text-center mt-4">

Zaten hesabın var mı?

<a href="/login">

Giriş Yap

</a>


</p>




</form>


</div>


</div>



</body>

</html>