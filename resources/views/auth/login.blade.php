<!DOCTYPE html>
<html lang="tr">

<head>

<meta charset="UTF-8">

<title>Giriş Yap | Staj Portalı</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<style>

body{

    background:#f7f2f3;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

}


.login-card{

    width:420px;

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


.btn-login{

    background:#800020;

    color:white;

}


.btn-login:hover{

    background:#5c0018;

}


</style>


</head>


<body>


<div class="card login-card">


<div class="card-top"></div>


<div class="card-body p-5 text-center">


<div class="logo">

<i class="bi bi-mortarboard-fill"></i>

</div>


<h2 class="mb-4">

Staj Portalı

</h2>


@if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif



@if($errors->any())

<div class="alert alert-danger">

@foreach($errors->all() as $error)

<p class="mb-0">{{ $error }}</p>

@endforeach

</div>

@endif



<form action="{{ url('/login') }}" method="POST">


@csrf


<div class="mb-3 text-start">

<label class="form-label">

E-posta

</label>


<input 
type="email"
name="email"
class="form-control"
placeholder="E-posta">


</div>



<div class="mb-4 text-start">

<label class="form-label">

Şifre

</label>


<input
type="password"
name="password"
class="form-control"
placeholder="Şifre">


</div>



<button class="btn btn-login w-100">

Giriş Yap

</button>



<p class="mt-4">

Hesabın yok mu?

<a href="/register">

Kayıt Ol

</a>

</p>



</form>


</div>

</div>



</body>

</html>