@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp
@extends('layouts.master-without-nav')
@section('title', 'Checkout')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
  <style>
    .feather {
      width: 3rem;
      height: 3rem;
    }
  </style>
@endsection

@section('content')
  <div class="container">
    <div class="row justify-content-md-center my-4">
      <div class="col-xl-8 col-md-11 col-xs-11 mt-4">
        <div class="card">
          <div class="card-header text-center">
            <div class="row">
              <div class="col-12 mb-3">
                <i class="feather" data-feather="shopping-cart"></i>
              </div>
              <div class="col-12">
                <h4 class="card-title">KONFIRMASI TRANSAKSI</h4>
              </div>
            </div>
          </div>
          <div class="card-body">
            <p>Berikut ini beberapa barang yang telah ditambahkan kedalam keranjang belanja. Pastikan seluruh barang sudah sesuai dan pastikan pembayaran yang diberikan sudah benar sebelum menyelesaikan transaksi!</p>

            <table class="table">
              <thead class="table-light">
                <th>Produk</th>
                <th>Keterangan</th>
                <th>Harga</th>
              </thead>
              <tbody>
                @foreach ($barangs as $i => $barang)
                  @php($barang = App\Models\Barang::find($barang))
                  @php($harga = $barang->harga_barang * $qty[$i])
                  <tr>
                    <td><img class="avatar-md" src="/images/barang/{{ $barang->gambar_barang }}" alt="{{ $barang->nama_barang }}"></td>
                    <td>
                      <h5 class="font-size-14">{{ $barang->nama_barang }}</h5>
                      <p class="text-muted">Rp{{ number_format($barang->harga_barang, 0, ',', '.') }} x {{ $qty[$i] }}</p>
                    </td>
                    <td>Rp{{ number_format($hargas[$i], 0, ',', '.') }}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot class="table-light">
                <th></th>
                <th class="text-end">
                  <div>Jumlah:</div>
                  <div class="mt-1">Diskon:</div>
                  <div class="fs-5 mt-1">Total:</div>
                </th>
                <th>
                  <div>Rp{{ number_format($totalHarga, 0, ',', '.') }}</div>
                  <div class="mt-1">0%</div>
                  <div class="fs-5 mt-1"><strong>Rp{{ number_format($totalHarga, 0, ',', '.') }}</strong></div>
                </th>
              </tfoot>
            </table>

            <form action="{{ route('checkout.store') }}" method="post">
              <span>
                @csrf
                @foreach ($barangs as $i => $barang)
                  <input type="hidden" name="barangs[]" value="{{ $barang }}">
                  <input type="hidden" name="qty[]" value="{{ $qty[$i] }}">
                @endforeach
                <input type="hidden" name="totalHarga" value="{{ $totalHarga }}">
              </span>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                  Rp{{ number_format($totalHarga, 0, ',', '.') }}
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Bayar</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control form-control-lg" placeholder="Masukkan jumlah pembayaran..." name="bayar" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kembalian</label>
                <div class="col-sm-10">
                  <strong class="fs-5"><span id="kembalian" class="text-dark"></span></strong>
                  <input type="hidden" name="kembalian" value="" required>
                </div>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-success btn-lg w-100" disabled>Selesaikan</button>
              </div>
              <div class="mb-3">
                <button type="button" class="btn btn-danger btn-lg w-100">Batalkan</button>
              </div>
            </form>

            <hr>
            <p class="text-muted mb-1 text-center">Transaksi ini dilakukan pada tanggal {{ Carbon::now()->isoFormat('DD/MM/YYYY HH:mm:ss') }}</p>
            <p class="text-muted mb-1 text-center"><a href="{{ route('beranda') }}">Kembali</a> | <a href="{{ route('riwayat') }}">Riwayat Transaksi</a> | <a href="{{ route('petunjuk') }}">Petunjuk</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}?ver={{ filemtime(public_path('assets/js/app.min.js')) }}"></script>
@endsection

@section('script-bottom')
  <script>
    $('input[name=bayar]').on('change keyup', function() {
      var inputTotal = '{{ $totalHarga }}';
      var inputKembalian = $('#kembalian');
      var kembalian = Math.floor($(this).val()) - inputTotal;
      let prefix = kembalian <= 0 ? '-' : '';
      inputKembalian.text(prefix + formatRupiah(kembalian, 'Rp'));
      $('input[name=kembalian]').val(kembalian);
      if (kembalian <= 0) {
        inputKembalian.removeClass('text-dark');
        inputKembalian.addClass('text-danger');
        $('button[type=submit]').attr('disabled', '');
      } else {
        inputKembalian.removeClass('text-danger');
        inputKembalian.addClass('text-dark');
        $('button[type=submit]').removeAttr('disabled');
      }
    });
  </script>
@endsection
