@extends('layouts.master')
@section('title', 'Pengguna')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/libs/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
  @component('components.breadcrumb', ['lk_1' => '/', 'lt_1' => 'Pengguna', 'title' => 'Daftar Pengguna'])
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
              <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalTambahPengguna">Tambah Pengguna</a>
            </div>
          </div>

          <div class="row">
            <div class="col p-0">
              <h4 class="card-title m-0">Daftar Akun Asisten LABKOMMAT</h4>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table-nowrap w-100 table" id="tabel_pengguna">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nama Pengguna</th>
                <th>Kode Asisten</th>
                <th>Nama Lengkap</th>
                <th>Pilihan</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penggunas as $pengguna)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><img src="/images/pengguna/{{ $pengguna->foto }}" alt="{{ $pengguna->nama_lengkap }}" class="avatar-md"></td>
                  <td><code class="fs-5">{{ $pengguna->nama_pengguna }}</code></td>
                  <td>{{ strtoupper($pengguna->kode_asisten) }}</td>
                  <td>{{ $pengguna->nama_lengkap }}</td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditPengguna{{ $pengguna->id }}">
                      Edit
                    </button>
                  </td>
                  @component('components.modal-form', ['modalId' => "modalEditPengguna$pengguna->id", 'modalSize' => 'modal-lg', 'formAction' => route('pengguna.update', ['pengguna' => $pengguna->id]), 'formId' => "formEditPengguna$pengguna->id", 'modalTitle' => 'Edit Pengguna', 'formSubmit' => false])
                    @method('PATCH')
                    <input type="hidden" name="pengguna_id" value="{{ $pengguna->id }}">
                    <input type="hidden" name="pageNumber" value="{{ $loop->iteration }}">

                    {{-- NAMA PENGGUNA --}}
                    <div class="mb-3">
                      <label class="form-label">Nama Pengguna</label>
                      @php($value = old('pengguna_id') == $pengguna->id ? old('nama_pengguna') : $pengguna->nama_pengguna)
                      @php($invalid = old('pengguna_id') == $pengguna->id && $errors->has('nama_pengguna') ? 'is-invalid' : '')
                      <input type="text" name="nama_pengguna" class="form-control {{ $invalid }}" value="{{ $value }}" required>
                      @if (old('pengguna_id') == $pengguna->id)
                        @error('nama_pengguna')
                          <div class="small text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      @endif
                    </div>


                    @slot('formButton')
                      <button type="button" class="btn btn-primary" id="buttonEditPengguna{{ $pengguna->id }}">Simpan</button>
                    @endslot
                  @endcomponent
                </tr>
                <script>
                  document.getElementById("buttonEditPengguna{{ $pengguna->id }}").addEventListener("click", function() {
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
                        document.getElementById("formEditPengguna{{ $pengguna->id }}").submit();
                      }
                    });
                  });
                </script>

                @if (old('pengguna_id') == $pengguna->id)
                  <script>
                    document.addEventListener("DOMContentLoaded", function(event) {
                      Toast.fire({
                        icon: 'error',
                        title: 'Data gagal tersimpan!'
                      })
                      new bootstrap.Modal(document.getElementById('modalEditPengguna{{ $pengguna->id }}')).show()
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
  <script src="{{ asset('js/pengguna.js') }}?ver={{ filemtime(public_path('js/pengguna.js')) }}"></script>
@endsection
