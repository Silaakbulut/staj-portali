@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>
    {{ $user->name }}
</h2>

<p>
    Email:
    {{ $user->email }}
</p>

<p>
    Rol:
    {{ $user->role }}
</p>


<hr>

<h3>
    Yazdığı Günlükler
</h3>


@foreach($gunlukler as $gunluk)

<div class="card mb-3">

    <div class="card-body">

        <h5>
            {{ $gunluk->baslik }}
        </h5>

        <p>
            {{ $gunluk->aciklama }}
        </p>

        <small>
            {{ $gunluk->tarih }}
        </small>

    </div>

</div>


@endforeach


</div>


@endsection