@extends('layouts.master-without-nav')
@section('title', 'Masuk')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
  <div class="auth-page">
    <div class="container-fluid p-0">
      <div class="row g-0">
        <div class="col-xxl-3 col-lg-4 col-md-5">
          <div class="auth-full-page-content d-flex p-sm-5 p-4">
            <div class="w-100">
              <div class="d-flex flex-column h-100">
                <div class="mb-md-5 mb-4 text-center">
                  <a href="{{ route('beranda') }}" class="d-block auth-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" height="28"> <span class="logo-txt">{{ config('app.name') }}</span>
                  </a>
                </div>
                <div class="auth-content my-auto">
                  <div class="text-center">
                    <h5 class="mb-0">Selamat Datang!</h5>
                    <p class="text-muted mt-2">Masuk sebagai asisten lab.</p>
                  </div>
                  <form class="mt-4 pt-2" action="{{ route('masuk.proses') }}" method="POST">
                    @csrf
                    <div class="form-floating form-floating-custom mb-4">
                      <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" value="{{ old('nama_pengguna') }}" id="input-username" placeholder="Masukkan nama pengguna" name="nama_pengguna" required autofocus>
                      @error('nama_pengguna')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      <label for="input-username">Nama Pengguna</label>
                      <div class="form-floating-icon">
                        <i data-feather="users"></i>
                      </div>
                    </div>

                    <div class="form-floating form-floating-custom auth-pass-inputgroup mb-4">
                      <input type="password" class="form-control pe-5 @error('kata_sandi') is-invalid @enderror" name="kata_sandi" id="password-input" placeholder="Masukkan kata sandi" required>
                      @error('kata_sandi')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                      <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                        <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                      </button>
                      <label for="input-password">Kata Sandi</label>
                      <div class="form-floating-icon">
                        <i data-feather="lock"></i>
                      </div>
                    </div>

                    <div class="mb-3">
                      <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Masuk</button>
                    </div>
                  </form>

                </div>
                <div class="mt-md-5 mt-4 text-center">
                  <p class="mb-0">©
                    <script>
                      document.write(new Date().getFullYear())
                    </script> {{ config('app.name') }} <br> Dibuat dengan <i class="mdi mdi-heart text-danger"></i> dari Mohpoe
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- end auth full page content -->
        </div>
        <!-- end col -->
        <div class="col-xxl-9 col-lg-8 col-md-7">
          <div class="auth-bg pt-md-5 d-flex p-4">
            <div class="bg-overlay"></div>
            <ul class="bg-bubbles">
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
            <!-- end bubble effect -->

            <div class="row justify-content-center align-items-end w-100">
              <div class="col-xl-7">
                <div class="p-sm-4 px-xl-0 p-0">
                  <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">
                      <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                        <img src="{{ asset('images/ava.webp') }}" class="avatar-md img-fluid rounded-circle d-block" alt="">
                      </button>
                      <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                        <img src="{{ asset('images/ava.webp') }}" class="avatar-md img-fluid rounded-circle d-block" alt="">
                      </button>
                      <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                        <img src="{{ asset('images/ava.webp') }}" class="avatar-md img-fluid rounded-circle d-block" alt="">
                      </button>
                    </div>
                    <!-- end carouselIndicators -->
                    <div class="carousel-inner">

                      <div class="carousel-item active">
                        <div class="testi-contain text-center text-white">
                          <i class="bx bxs-quote-alt-left text-success display-6"></i>
                          <h4 class="fw-medium lh-base mt-4 text-white">“Tidak apalah 'miskin' harta, 'miskin' wajah, atau 'miskin' hidung pula;
                            setidaknya kita kaya hati, kaya sahabat, dan kaya keluarga. Itu lebih keren.”</h4>
                          <div class="mt-4 mb-5 pt-1 pb-5">
                            <h5 class="font-size-16 text-white">HD
                            </h5>
                            <p class="text-white-50 mb-0">Developer</p>
                          </div>
                        </div>
                      </div>

                      <div class="carousel-item">
                        <div class="testi-contain text-center text-white">
                          <i class="bx bxs-quote-alt-left text-success display-6"></i>
                          <h4 class="fw-medium lh-base mt-4 text-white">“Tiap masa ada orangnya, dan tiap orang ada masanya.”</h4>
                          <div class="mt-4 mb-5 pt-1 pb-5">
                            <h5 class="font-size-16 text-white">David GadgetIn
                            </h5>
                            <p class="text-white-50 mb-0">YouTuber</p>
                          </div>
                        </div>
                      </div>

                      <div class="carousel-item">
                        <div class="testi-contain text-center text-white">
                          <i class="bx bxs-quote-alt-left text-success display-6"></i>
                          <h4 class="fw-medium lh-base mt-4 text-white">“Saat kita tertawa, hanya kitalah yang tahu persis apakah tawa itu bahagia atau tidak.
                            Boleh jadi, kita sedang tertawa dalam seluruh kesedihan.
                            Orang lain hanya melihat wajah.
                            Saat kita menangis pun sama, hanya kita yang tahu persis apakah tangisan itu sedih atau tidak.
                            Boleh jadi kita sedang menangis dalam seluruh kebahagiaan. Orang lain hanya melihat luar.”</h4>
                          <div class="mt-4 mb-5 pt-1 pb-5">
                            <h5 class="font-size-16 text-white">Tere Liye</h5>
                            <p class="text-white-50 mb-0">Penulis
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end carousel-inner -->
                  </div>
                  <!-- end review carousel -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container fluid -->
  </div>
@endsection
@section('script')
  <script src="{{ asset('assets/js/pages/pass-addon.init.js') }}"></script>
  <script src="{{ asset('assets/js/pages/feather-icon.init.js') }}"></script>
  <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@section('script-bottom')
  @if (session()->has('pesanGagal'))
    <script>
      Toast.fire({
        icon: 'error',
        title: 'Nama pengguna dan/atau kata sandi tidak sesuai!'
      })
    </script>
  @endif
@endsection
