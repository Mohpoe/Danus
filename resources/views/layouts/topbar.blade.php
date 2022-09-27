<header id="page-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <!-- LOGO -->
      <div class="navbar-brand-box">
        <a href="{{ route('beranda') }}" class="logo logo-dark">
          <span class="logo-sm">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="30">
          </span>
          <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24"> <span class="logo-txt">{{ config('app.name') }}</span>
          </span>
        </a>

        <a href="{{ route('beranda') }}" class="logo logo-light">
          <span class="logo-sm">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="30">
          </span>
          <span class="logo-lg">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="24"> <span class="logo-txt">{{ config('app.name') }}</span>
          </span>
        </a>
      </div>

      <button type="button" class="btn btn-sm font-size-16 header-item px-3" id="vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
      </button>
    </div>

    <div class="d-flex">
      <div class="dropdown d-none d-sm-inline-block">
        <button type="button" class="btn header-item" id="mode-setting-btn">
          <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
          <i data-feather="sun" class="icon-lg layout-mode-light"></i>
        </button>
      </div>

      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="@guest {{ asset('images/pengguna/ava.webp') }}@else{{ Auth::user()->foto }} @endguest" alt="Header Avatar">
          <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->nama_lengkap ?? 'Tamu' }}</span>
          <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <!-- item-->
          @auth
            <a class="dropdown-item" href="#"><i class="mdi mdi-account-cog-outline font-size-16 me-1 align-middle"></i> Profil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout font-size-16 me-1 align-middle"></i> <span>Keluar</span></a>
            <form id="logout-form" class="d-none" action="{{ route('keluar') }}" method="POST">
              @csrf
            </form>
          @else
            <a class="dropdown-item" href="#"><i class="mdi mdi-help-circle-outline font-size-16 me-1 align-middle"></i> Bantuan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('masuk.tampil') }}"><i class="mdi mdi-login font-size-16 me-1 align-middle"></i> Masuk</a>
          @endauth
        </div>
      </div>

    </div>
  </div>
</header>
