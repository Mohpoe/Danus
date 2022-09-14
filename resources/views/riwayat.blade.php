@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@extends('layouts.master')
@section('title', 'Riwayat')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/libs/datatables/datatables.min.css') }}">
@endsection

@section('content')
  @component('components.breadcrumb', ['lk_1' => '/', 'lt_1' => 'Beranda', 'title' => 'Riwayat'])
  @endcomponent

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">

          <div class="dropdown float-end">
            <a class="text-muted dropdown-toggle font-size-16 lh-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
              <i class="bx bx-dots-horizontal-rounded"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              @if (Auth::user()->peran == '0')
                <a class="dropdown-item text-danger" href="#">Hapus Riwayat</a>
              @endif
              {{-- <a class="dropdown-item" href="#">Lihat Riwayat</a> --}}
            </div>
          </div>

          <div class="row">
            <div class="col p-0">
              <h4 class="card-title m-0">Riwayat Transaksi</h4>
            </div>
          </div>

          {{-- <h4 class="card-title">Riwayat Transaksi</h4> --}}
          {{-- <p class="card-title-desc">Apabila Anda mengalami kesulitan dalam melakukan pengisian data pengajuan Surat Keterangan Bebas Temuan, silakan ikuti petunjuk berikut.</p> --}}
        </div>
        <div class="card-body">
          {{-- <div class="table-responsive"> --}}
          <table class="table-nowrap table" id="tabel_riwayat">
            <thead class="table-light">
              <tr>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Bayar</th>
                <th>Kembali</th>
                <th>Pengguna</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($riwayats as $riwayat)
                <tr>
                  <td>{{ $riwayat->created_at }}</td>
                  <td>{{ $riwayat->barang->nama_barang }}</td>
                  {{-- <td>Rp{{ number_format($riwayat->barang->harga_barang, 0, ',', '.') }}</td> --}}
                  <td class="rupiah">{{ $riwayat->barang->harga_barang }}</td>
                  <td>{{ $riwayat->jumlah }}</td>
                  {{-- <td>Rp{{ number_format($riwayat->barang->harga_barang * $riwayat->jumlah, 0, ',', '.') }}</td> --}}
                  <td class="rupiah">{{ $riwayat->barang->harga_barang * $riwayat->jumlah }}</td>
                  {{-- <td>Rp{{ number_format($riwayat->total, 0, ',', '.') }}</td> --}}
                  <td class="rupiah">{{ $riwayat->total }}</td>
                  {{-- <td>Rp{{ number_format($riwayat->bayar, 0, ',', '.') }}</td> --}}
                  <td class="rupiah">{{ $riwayat->bayar }}</td>
                  {{-- <td>Rp{{ number_format($riwayat->kembalian, 0, ',', '.') }}</td> --}}
                  <td class="rupiah">{{ $riwayat->kembalian }}</td>
                  <td>{{ $riwayat->pengguna->nama_lengkap }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}?ver={{ filemtime(public_path('assets/js/app.min.js')) }}"></script>
  <script src="{{ asset('js/script.js') }}?ver={{ filemtime(public_path('js/script.js')) }}"></script>
  <script src="{{ asset('js/riwayat.js') }}?ver={{ filemtime(public_path('js/riwayat.js')) }}"></script>
@endsection
