@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@extends('layouts.master')
@section('title', 'Kasir')

@section('css')
  {{-- <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('assets/libs/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
  @component('components.breadcrumb', ['lk_1' => '/', 'lt_1' => 'Danus', 'title' => 'Kasir'])
  @endcomponent

  <div class="row">
    {{-- TABEL KATALOG BARANG --}}
    <div class="col-xxl-7 col-md-12">
      <div class="card card-h-100">
        <div class="card-header">
          <div class="dropdown float-end">
            <a class="text-muted dropdown-toggle font-size-16 lh-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
              <i class="bx bx-dots-horizontal-rounded"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="{{ route('barang.index') }}">Atur Barang</a>
              <a class="dropdown-item" href="{{ route('riwayat') }}">Lihat Riwayat</a>
            </div>
          </div>

          <div class="row">
            <div class="col p-0">
              <h4 class="card-title m-0">Katalog Barang</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table-nowrap table" id="tabel_barang">
              <thead class="table-light">
                <tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Pilihan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($barangs as $barang)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    {{-- <td>Rp{{ number_format($barang->harga_barang, 0, ',', '.') }}</td> --}}
                    <td>{{ $barang->harga_barang }}</td>
                    <td>
                      <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalBarang{{ $barang->id }}">
                        Detail
                      </button>
                      <button type="button" class="btn btn-success btn-sm ms-1" onclick="addTableRow('{{ $barang->id }}', '{{ $barang->nama_barang }}', '{{ $barang->harga_barang }}')">
                        Beli
                      </button>
                    </td>
                  </tr>
                  @component('components.modal', ['modalId' => "modalBarang$barang->id", 'modalTitle' => "Detail: $barang->nama_barang"])
                    <div class="px-2">
                      <div class="row">
                        <img src="{{ asset('images/barang/' . $barang->gambar_barang) }}" alt="{{ $barang->nama_barang }}" class="w-100">
                      </div>
                      <div class="row">
                        <div class="border-bottom col p-1">Nama Barang</div>
                        <div class="border-bottom col p-1">{{ $barang->nama_barang }}</div>
                      </div>
                      <div class="row">
                        <div class="border-bottom col p-1">Harga Barang</div>
                        <div class="border-bottom col p-1">Rp{{ number_format($barang->harga_barang, 0, ',', '.') }}</div>
                      </div>
                      <div class="row">
                        <div class="border-bottom col p-1">Deskripsi Barang</div>
                        <div class="border-bottom col p-1">{{ $barang->deskripsi_barang }}</div>
                      </div>
                    </div>
                  @endcomponent
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    {{-- LIST DAFTAR BELANJAAN --}}
    <div class="col-xxl-5 col-md-12">
      <div class="card">
        <div class="card-header">

          <div class="dropdown float-end">
            <a class="text-muted dropdown-toggle font-size-16 lh-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
              <i class="bx bx-dots-horizontal-rounded"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="javascript:void(0);" onclick="emptyTable()">Kosongkan</a>
            </div>
          </div>

          <div class="row">
            <div class="col p-0">
              <h4 class="card-title m-0">Keranjang Belanja</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <form action="{{ route('checkout.index') }}" method="post">
              @csrf
              <div class="col-12 mb-3">
                <div class="table-responsive">
                  <table class="table-sm table" id="checkoutTable">
                    <colgroup>
                      <col>
                      <col width="20%">
                      <col>
                      <col width="5%">
                    </colgroup>
                    <tbody>
                      {{-- <tr>
                        <td class="align-middle">
                          Cetak Abu-Abu Kertas Lab
                        </td>
                        <td class="align-middle" width="20%">
                          <input type="number" name="qty[]" class="form-control form-control-sm" value="3">
                        </td>
                        <td class="align-middle">
                          Rp300
                        </td>
                        <td class="align-middle">
                          <input type="hidden" name="barangs[]" value="1">
                          <a href="javascript:void(0);" class="action-icon text-danger delButton"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                        </td>
                      </tr> --}}

                      {{-- <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                        <input type="text" value="02" name="demo_vertical" class="form-control">
                        <span class="input-group-btn-vertical">
                          <button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
                          <button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
                        </span>
                      </div> --}}
                    </tbody>
                    <tfoot class="table-light">
                      <tr class="text-muted">
                        <th><span class="jumlahBarang me-1">0</span> item</th>
                        <th class="text-end">Total:</th>
                        <th><span class="jumlahHarga">Rp0</span></th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class="col-12" id="checkoutButton"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  {{-- <script src="{{ asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script> --}}
  <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}?ver={{ filemtime(public_path('assets/js/app.min.js')) }}"></script>
  <script src="{{ asset('js/script.js') }}?ver={{ filemtime(public_path('js/script.js')) }}"></script>
  <script src="{{ asset('js/kasir.js') }}?ver={{ filemtime(public_path('js/kasir.js')) }}"></script>
@endsection

@section('script-bottom')
  <script>
    $("input[name='qty[]']").TouchSpin({
      verticalbuttons: !0
    });
  </script>
  @if (session()->has('pesanSukses'))
    <script>
      Toast.fire({
        icon: 'success',
        title: "{{ session('pesanSukses') ? session('pesanSukses') : 'Data berhasil tersimpan!' }}"
      })
    </script>
  @elseif (session()->has('pesanGagal'))
    <script>
      Toast.fire({
        icon: 'error',
        title: "{{ session('pesanGagal') ? session('pesanGagal') : 'Terjadi kesalahan!' }}"
      })
    </script>
  @endif
@endsection
