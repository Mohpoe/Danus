@extends('layouts.master')
@section('title', 'Profil')

@section('content')
  @component('components.breadcrumb', ['lk_1' => '/', 'lt_1' => 'Beranda', 'title' => 'Profil'])
  @endcomponent

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Halaman Profil</h4>
          {{-- <p class="card-title-desc">Apabila Anda mengalami kesulitan dalam melakukan pengisian data pengajuan Surat Keterangan Bebas Temuan, silakan ikuti petunjuk berikut.</p> --}}
        </div>
        <div class="card-body">
          // dalam pengembangan //
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('assets/js/app.min.js') }}?ver={{ filemtime(public_path('assets/js/app.min.js')) }}"></script>
@endsection
