@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>Günlük Yönetimi</h2>

<table class="table table-bordered">

<thead>
<tr>
    <th>Başlık</th>
    <th>Öğrenci</th>
    <th>Tarih</th>
    <th>İşlemler</th>
</tr>
</thead>


<tbody>

@foreach($gunlukler as $gunluk)

<tr>

<td>
    {{ $gunluk->baslik }}
</td>


<td>
    {{ $gunluk->user->name }}
</td>


<td>
    {{ $gunluk->tarih }}
</td>


<td>

<a href="{{ route('admin.gunluk.detay',$gunluk->id) }}"
   class="btn btn-primary btn-sm">

    Detay

</a>


@if($gunluk->dosya)

<a href="{{ asset('storage/'.$gunluk->dosya) }}"
   target="_blank"
   class="btn btn-info btn-sm">

    📄 Belge

</a>

@endif


<form action="{{ route('admin.gunluk.destroy',$gunluk->id) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button 
        class="btn btn-danger btn-sm"
        onclick="return confirm('Bu günlüğü silmek istediğinize emin misiniz?')">

        Sil

    </button>

</form>


</td>


</tr>

@endforeach

</tbody>

</table>


{{ $gunlukler->links() }}


</div>

@endsection