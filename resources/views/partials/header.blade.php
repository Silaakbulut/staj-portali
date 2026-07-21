<div class="topbar">

    {{-- Sol Taraf --}}
    <div>

        <h4 class="mb-1 fw-bold">
            <i class="bi bi-speedometer2 text-bordo"></i>
            Ana Sayfa
        </h4>

        <small class="text-muted">
            Staj Portalı Yönetim Sistemi
        </small>

    </div>


    {{-- Sağ Taraf --}}
    <div class="d-flex align-items-center gap-4">

        {{-- Tarih --}}
        <div class="text-end">

            <small class="text-muted d-block">

                <i class="bi bi-calendar3"></i>

                {{ now()->translatedFormat('d F Y') }}

            </small>

            <small class="text-muted">

                {{ now()->translatedFormat('l') }}

            </small>

        </div>


        {{-- Kullanıcı --}}
        <div class="user-box">

            <div class="user-avatar">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

            <div>

                <div class="fw-semibold">

                    {{ Auth::user()->name }}

                </div>

                <small class="text-muted">

                    {{ ucfirst(Auth::user()->role) }}

                </small>

            </div>

        </div>

    </div>

</div>