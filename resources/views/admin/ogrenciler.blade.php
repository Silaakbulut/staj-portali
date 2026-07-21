@extends('layouts.app')

@section('content')

<div class="container mt-4">

<h2>Öğrenci Listesi</h2>

<table class="table">

    <thead>
        <tr>
            <th>Ad</th>
            <th>Email</th>
            <th>İşlemler</th>
        </tr>
    </thead>

    <tbody>

    @foreach($ogrenciler as $ogrenci)

        <tr>

            <td>{{ $ogrenci->name }}</td>

            <td>{{ $ogrenci->email }}</td>

            <td>

                <a href="{{ route('admin.ogrenci.show', $ogrenci->id) }}"
                   class="btn btn-primary btn-sm">
                    Detay
                </a>

                <form action="{{ route('admin.ogrenci.destroy', $ogrenci->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Bu öğrenciyi silmek istediğinize emin misiniz?')">

                        Sil

                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

{{ $ogrenciler->links() }}

</div>

@endsection