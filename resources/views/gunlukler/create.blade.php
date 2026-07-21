@extends('layouts.app')

@section('content')

<div class="container">

<h2 class="mb-4">Yeni Günlük Ekle</h2>

<form action="{{ route('gunlukler.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="mb-3">
    <label>Başlık</label>
    <input type="text" 
           name="baslik" 
           class="form-control">
</div>


<div class="mb-3">
    <label>Açıklama</label>
    <textarea name="aciklama"
              class="form-control"></textarea>
</div>


<div class="mb-3">
    <label>Tarih</label>
    <input type="date"
           name="tarih"
           class="form-control">
</div>

<div class="mb-3">

    <label class="form-label">Staj Belgesi (PDF, Word veya Resim)</label>

    <input
        type="file"
        name="dosya"
        class="form-control">

</div>


<button class="btn btn-success">
    Kaydet
</button>


</form>

</div>
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


@endsection