<div class="sidebar">

    {{-- Logo --}}
    <div class="sidebar-header">

        <div class="logo-circle">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <h4>STAJ PORTALI</h4>

        <small>{{ Auth::user()->role == 'admin' ? 'Yönetici Paneli' : 'Öğrenci Paneli' }}</small>

    </div>

    <hr class="sidebar-divider">

    {{-- Menü --}}
    <div class="sidebar-menu">

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-grid-1x2-fill"></i>

            <span>Ana Sayfa</span>

        </a>


        <a href="{{ route('gunlukler.index') }}"
           class="{{ request()->routeIs('gunlukler.*') ? 'active' : '' }}">

            <i class="bi bi-journal-richtext"></i>

            <span>Günlüklerim</span>

        </a>


        <a href="/profil"
           class="{{ request()->is('profil') ? 'active' : '' }}">

            <i class="bi bi-person-circle"></i>

            <span>Profilim</span>

        </a>


        @if(Auth::user()->role=="admin")

        <a href="/admin"
           class="{{ request()->is('admin*') ? 'active' : '' }}">

            <i class="bi bi-shield-lock-fill"></i>

            <span>Admin Paneli</span>

        </a>

        @endif

    </div>


    {{-- Alt Bilgi --}}
    <div class="sidebar-bottom">

        <hr class="sidebar-divider">

        <div class="small text-center text-light opacity-75 mb-3">

            <i class="bi bi-person-badge-fill"></i>

            <br>

            {{ Auth::user()->name }}

        </div>


        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout-btn w-100">

                <i class="bi bi-box-arrow-right"></i>

                Çıkış Yap

            </button>

        </form>

    </div>

</div>