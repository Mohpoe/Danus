@extends('layouts.master')
@section('title', 'Barang')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/libs/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
  @component('components.breadcrumb', ['lk_1' => '/', 'lt_1' => 'Danus', 'title' => 'Barang'])
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
              <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">Tambah Barang</a>
              <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">Impor Data Barang</a>
              <a class="dropdown-item" href="{{ route('unduh', ['file' => $format_impor, 'name' => 'Format Impor Data Barang.xlsx']) }}">Unduh Format Impor</a>
            </div>
          </div>

          <div class="row">
            <div class="col p-0">
              <h4 class="card-title m-0">Data Barang</h4>
            </div>
          </div>
        </div>

        @component('components.modal-form', ['modalId' => 'modalTambahBarang', 'modalSize' => 'modal-lg', 'formAction' => route('barang.store'), 'formId' => 'formTambahBarang', 'formFile' => true, 'modalTitle' => 'Tambah Barang', 'formSubmit' => false])
          {{-- NAMA BARANG --}}
          <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            @php($invalid = $errors->has('nama_barang') ? 'is-invalid' : '')
            <input type="text" name="nama_barang" class="form-control {{ $invalid }}" value="{{ old('nama_barang') }}" required>
            @error('nama_barang')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- HARGA BARANG --}}
          <div class="mb-3">
            <label class="form-label">Harga Barang</label>
            @php($invalid = $errors->has('harga_barang') ? 'is-invalid' : '')
            <input type="number" name="harga_barang" class="form-control {{ $invalid }}" value="{{ old('harga_barang') }}" required>
            @error('harga_barang')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- DESKRIPSI BARANG --}}
          <div class="mb-3">
            <label class="form-label">Deskripsi Barang</label>
            @php($invalid = $errors->has('deskripsi_barang') ? 'is-invalid' : '')
            <textarea name="deskripsi_barang" id="" rows="3" class="form-control {{ $invalid }}" required>{{ old('deskripsi_barang') }}</textarea>
            @error('deskripsi_barang')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- GAMBAR BARANG --}}
          <div class="mb-3">
            <label class="form-label">Gambar Barang</label>
            @php($invalid = $errors->has('gambar_barang') ? 'is-invalid' : '')
            <div class="row">
              <div class="col-sm col-xs-12 mb-1">
                <input class="form-control {{ $invalid }}" name="gambar_barang" type="file" accept="image/png, image/gif, image/jpeg">
              </div>
            </div>
            @error('gambar_barang')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          @slot('formButton')
            <button type="button" class="btn btn-primary" id="buttonTambahBarang">Simpan</button>
          @endslot
        @endcomponent

        <script>
          document.getElementById("buttonTambahBarang").addEventListener("click", function() {
            Swal.fire({
              title: "Yakin ingin mengirim data?",
              text: "Pastikan data yang dikirim sudah benar!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#1c84ee",
              cancelButtonColor: "#fd625e",
              confirmButtonText: "Ya, kirim!",
              cancelButtonText: "Batal",
            }).then(function(result) {
              if (result.value) {
                document.getElementById("formTambahBarang").submit();
              }
            });
          });
        </script>

        <div class="card-body">
          <table class="table-nowrap w-100 table" id="tabel_barang">
            <thead class="table-light">
              <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                {{-- <th>Deskripsi</th> --}}
                <th>Pilihan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($barangs as $barang)
                <tr>
                  <td><img src="{{ $barang->gambar_barang }}" alt="{{ $barang->nama_barang }}" class="avatar-md"></td>
                  <td>{{ $barang->nama_barang }}</td>
                  <td>{{ $barang->harga_barang }}</td>
                  {{-- <td>{{ $barang->deskripsi_barang }}</td> --}}
                  <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditBarang{{ $barang->id }}">
                      Edit
                    </button>
                  </td>
                  @component('components.modal-form', ['modalId' => "modalEditBarang$barang->id", 'modalSize' => 'modal-lg', 'formAction' => route('barang.update', ['barang' => $barang->id]), 'formId' => "formEditBarang$barang->id", 'formFile' => true, 'modalTitle' => 'Edit Barang', 'formSubmit' => false])
                    @method('PATCH')
                    <input type="hidden" name="id_barang" value="{{ $barang->id }}">
                    <input type="hidden" name="pageNumber" value="{{ $loop->iteration }}">

                    {{-- NAMA BARANG --}}
                    <div class="mb-3">
                      <label class="form-label">Nama Barang</label>
                      @php($value = old('id_barang') == $barang->id ? old('nama_barang') : $barang->nama_barang)
                      @php($invalid = old('id_barang') == $barang->id && $errors->has('nama_barang') ? 'is-invalid' : '')
                      <input type="text" name="nama_barang" class="form-control {{ $invalid }}" value="{{ $value }}" required>
                      @if (old('id_barang') == $barang->id)
                        @error('nama_barang')
                          <div class="small text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      @endif
                    </div>

                    {{-- HARGA BARANG --}}
                    <div class="mb-3">
                      <label class="form-label">Harga Barang</label>
                      @php($value = old('id_barang') == $barang->id ? old('harga_barang') : $barang->harga_barang)
                      @php($invalid = old('id_barang') == $barang->id && $errors->has('harga_barang') ? 'is-invalid' : '')
                      <input type="number" name="harga_barang" class="form-control {{ $invalid }}" value="{{ $value }}" required>
                      @if (old('id_barang') == $barang->id)
                        @error('harga_barang')
                          <div class="small text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      @endif
                    </div>

                    {{-- DESKRIPSI BARANG --}}
                    <div class="mb-3">
                      <label class="form-label">Deskripsi Barang</label>
                      @php($value = old('id_barang') == $barang->id ? old('deskripsi_barang') : $barang->deskripsi_barang)
                      @php($invalid = old('id_barang') == $barang->id && $errors->has('deskripsi_barang') ? 'is-invalid' : '')
                      {{-- <input type="text" name="deskripsi_barang" class="form-control {{ $invalid }}" value="{{ $value }}" required> --}}
                      <textarea name="deskripsi_barang" id="" rows="3" class="form-control" required>{{ $value }}</textarea>
                      @if (old('id_barang') == $barang->id)
                        @error('deskripsi_barang')
                          <div class="small text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      @endif
                    </div>

                    {{-- GAMBAR BARANG --}}
                    <div class="mb-3">
                      <label class="form-label">Gambar Barang</label>
                      @php($invalid = old('id_barang') == $barang->id && $errors->has('gambar_barang') ? 'is-invalid' : '')
                      <div class="row">
                        <div class="col-sm col-xs-12 mb-1">
                          <input class="form-control {{ $invalid }}" name="gambar_barang" type="file" accept="image/png, image/gif, image/jpeg">
                        </div>
                        <div class="col-sm-auto col-xs-12 mb-1">
                          <button type="button" class="btn btn-danger {{ $barang->getRawOriginal('gambar_barang') == '' ? 'disabled' : '' }}" onclick="document.getElementById('hapusGambarBarang').submit()">Hapus Foto</button>
                        </div>
                      </div>
                      @if (old('id_barang') == $barang->id)
                        @error('gambar_barang')
                          <div class="small text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      @endif
                    </div>

                    @slot('formButton')
                      <button type="button" class="btn btn-primary" id="buttonEditBarang{{ $barang->id }}">Simpan</button>
                    @endslot
                  @endcomponent

                  <div class="d-none">
                    <form action="{{ route('barang.update', ['barang' => $barang->id]) }}" method="post" class="d-none" id="hapusGambarBarang">
                      @csrf
                      @method('PATCH')
                      <input type="hidden" name="hapus_gambar_barang" value="1">
                    </form>
                  </div>
                </tr>
                <script>
                  document.getElementById("buttonEditBarang{{ $barang->id }}").addEventListener("click", function() {
                    Swal.fire({
                      title: "Yakin ingin mengirim data?",
                      text: "Pastikan data yang dikirim sudah benar!",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#1c84ee",
                      cancelButtonColor: "#fd625e",
                      confirmButtonText: "Ya, kirim!",
                      cancelButtonText: "Batal",
                    }).then(function(result) {
                      if (result.value) {
                        document.getElementById("formEditBarang{{ $barang->id }}").submit();
                      }
                    });
                  });
                </script>

                @if (old('id_barang') == $barang->id)
                  <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                      Toast.fire({
                        icon: 'error',
                        title: 'Data gagal tersimpan!'
                      })
                      new bootstrap.Modal(document.getElementById('modalEditBarang{{ $barang->id }}')).show()
                    });
                  </script>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}?ver={{ filemtime(public_path('assets/js/app.min.js')) }}"></script>
  <script src="{{ asset('js/script.js') }}?ver={{ filemtime(public_path('js/script.js')) }}"></script>
  <script src="{{ asset('js/barang.js') }}?ver={{ filemtime(public_path('js/barang.js')) }}"></script>
@endsection

@section('script-bottom')
  @if ($errors->has('nama_barang') || $errors->has('harga_barang') || $errors->has('deskripsi_barang') || $errors->has('gambar_barang'))
    <script>
      new bootstrap.Modal(document.getElementById('modalTambahBarang')).show()
      Toast.fire({
        icon: 'error',
        title: 'Data gagal tersimpan!'
      })
    </script>
  @elseif (session()->has('pesanSukses'))
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
        title: "{{ session('pesanGagal') ? session('pesanGagal') : 'Perintah tidak dapat diproses!' }}"
      })
    </script>
  @elseif (session()->has('pesanHapus'))
    <script>
      Toast.fire({
        icon: 'warning',
        title: "{{ session('pesanHapus') ? session('pesanHapus') : 'Semua data dihapus!' }}"
      })
    </script>
  @endif

  <script>
    $(document).ready(function() {
      $('.btn-kirim').on('click', function() {
        var form = $(this).closest('.modal-footer').closest('.modal-content').find('.modal-body');
        var nama_barang = form.find('input[name=nama_barang]').val();
        // $.ajax({
        //   type: 'POST',
        // });
      });
    });
  </script>
@endsection
