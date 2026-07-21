<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="/AnaSayfa">
            <i class="bi bi-journal-bookmark-fill"></i>
            Staj Portalı
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">

                    <a class="nav-link" href="/AnaSayfa">
                        <i class="bi bi-house-door"></i>
                        Ana Sayfa
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="/gunlukler">
                        <i class="bi bi-journal-text"></i>
                        Günlükler
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="/profil">
                        <i class="bi bi-person-circle"></i>
                        Profil
                    </a>

                </li>

                @if(Auth::check() && Auth::user()->role == 'admin')

                    <li class="nav-item">

                        <a class="nav-link" href="/admin">
                            <i class="bi bi-speedometer2"></i>
                            Admin Paneli
                        </a>

                    </li>

                @endif

            </ul>

            @auth

                <span class="navbar-text me-3">

                    <i class="bi bi-person"></i>

                    {{ Auth::user()->name }}

                </span>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button class="btn btn-light btn-sm">

                        <i class="bi bi-box-arrow-right"></i>

                        Çıkış Yap

                    </button>

                </form>

            @endauth

        </div>

    </div>

</nav>