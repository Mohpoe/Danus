@extends('layouts.master-without-nav')
@section('title')
  Kesalahan 500
@endsection
@section('body')

  <body>
  @endsection
  @section('content')
    <div class="my-5 pt-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-5 pt-5 text-center">
              <h1 class="error-title mt-5"><span>500!</span></h1>
              <h4 class="text-uppercase mt-5">Kesalahan Internal Server</h4>
              <p class="font-size-15 text-muted w-50 mx-auto mt-4">Terdapat masalah internal pada server saat Anda mengakses halaman ini, laporkan pada pengembang untuk ditangani!</p>
              <div class="mt-5 text-center">
                <a class="btn btn-primary waves-effect waves-light" href="{{ route('beranda') }}">Kembali ke Beranda</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end container -->
    </div>
  @endsection
