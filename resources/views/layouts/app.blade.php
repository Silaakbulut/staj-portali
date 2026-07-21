<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Staj Portalı</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

<div class="wrapper">

    {{-- Sidebar --}}
    @auth
        @include('partials.sidebar')
    @endauth


    <div class="main">

        {{-- Header --}}
        @auth
            @include('partials.header')
        @endauth


        <div class="content">

            {{-- Başarılı İşlem Mesajı --}}
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- Hata Mesajları --}}
            @if ($errors->any())

                <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4">

                    <i class="bi bi-exclamation-triangle-fill me-2"></i>

                    <strong>Bir hata oluştu.</strong>

                    <ul class="mb-0 mt-2">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            {{-- Sayfa İçeriği --}}
            @yield('content')

        </div>

    </div>

</div>


{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>