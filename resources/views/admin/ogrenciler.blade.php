@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>Öğrenci Listesi</h2>

<table class="table">

<thead>
<tr>
<th>Ad</th>
<th>Email</th>
</tr>
</thead>


<tbody>

@foreach($ogrenciler as $ogrenci)

<tr>

<td>
{{ $ogrenci->name }}
</td>

<td>
{{ $ogrenci->email }}
</td>

<td>
    <a href="{{ route('admin.ogrenci.show', $ogrenci->id) }}"
       class="btn btn-primary btn-sm">
        Detay
    </a>
</td>

</tr>

@endforeach


</tbody>

</table>
{{ $ogrenciler->links() }}

</div>

@endsection