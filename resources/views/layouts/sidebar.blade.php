<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

  <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <!-- Left Menu Start -->
      <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        {{-- <li>
          <a href="{{ route('beranda') }}">
            @guest
              <i data-feather="home"></i>
              <span>Beranda</span>
            @else
              <i data-feather="shopping-cart"></i>
              <span>Kasir</span>
            @endguest
          </a>
        </li> --}}

        @auth
          <li>
            <a href="javascript: void(0);" class="has-arrow">
              <i data-feather="shopping-cart"></i>
              <span>Danus</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              <li><a href="{{ route('beranda') }}">Kasir</a></li>
              @if (Auth::user()->peran == '0')
                <li><a href="{{ route('barang.index') }}">Barang</a></li>
              @endif
              <li><a href="{{ route('riwayat') }}">Riwayat</a></li>
            </ul>
          </li>

          {{-- <li>
            <a href="{{ route('riwayat') }}">
              <i data-feather="archive"></i>
              <span>Riwayat</span>
            </a>
          </li>
          @if (Auth::user()->peran == '0')
            <li>
              <a href="{{ route('barang.index') }}">
                <i data-feather="package"></i>
                <span>Barang</span>
              </a>
            </li>
          @endif --}}

          <li>
            <a href="javascript: void(0);" class="has-arrow">
              <i data-feather="user-check"></i>
              <span>Pengguna</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
              @if (Auth::user()->peran == '0')
                <li><a href="{{ route('pengguna.index') }}">Daftar Pengguna</a></li>
              @endif
              <li><a href="{{ route('profil.index') }}">Profil</a></li>
              <li><a href="{{ route('keluar') }}">Keluar</a></li>
            </ul>
          </li>

          <li class="menu-title">Lainnya</li>

          <li>
            <a href="{{ route('petunjuk') }}">
              <i data-feather="help-circle"></i>
              <span>Petunjuk</span>
            </a>
          </li>
        @else
          <li>
            <a href="{{ route('bantuan') }}">
              <i data-feather="help-circle"></i>
              <span>Bantuan</span>
            </a>
          </li>
          <li>
            <a href="{{ route('masuk.tampil') }}">
              <i data-feather="log-in"></i>
              <span>Masuk</span>
            </a>
          </li>
        @endauth

      </ul>

    </div>
    <!-- Sidebar -->
  </div>
</div>
<!-- Left Sidebar End -->
