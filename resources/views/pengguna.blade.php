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

        @component('components.modal-form', ['modalId' => 'modalTambahPengguna', 'modalSize' => 'modal-lg', 'formAction' => route('pengguna.store'), 'formId' => 'formTambahPengguna', 'formFile' => true, 'modalTitle' => 'Tambah Pengguna', 'formSubmit' => false])
          {{-- NAMA PENGGUNA --}}
          <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            @php($invalid = $errors->has('nama_pengguna') ? 'is-invalid' : '')
            <input type="text" name="nama_pengguna" class="form-control {{ $invalid }}" value="{{ old('nama_pengguna') }}" required>
            @error('nama_pengguna')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- KODE ASISTEN --}}
          <div class="mb-3">
            <label class="form-label">Kode Asisten</label>
            @php($invalid = $errors->has('kode_asisten') ? 'is-invalid' : '')
            <input type="number" name="kode_asisten" class="form-control {{ $invalid }}" value="{{ old('kode_asisten') }}" required>
            @error('kode_asisten')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- NAMA LENGKAP --}}
          <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            @php($invalid = $errors->has('nama_lengkap') ? 'is-invalid' : '')
            <input type="text" name="nama_lengkap" class="form-control {{ $invalid }}" value="{{ old('nama_lengkap') }}" required>
            @error('nama_lengkap')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- FOTO --}}
          <div class="mb-3">
            <label class="form-label">Foto</label>
            @php($invalid = $errors->has('foto') ? 'is-invalid' : '')
            <div class="row">
              <div class="col-sm col-xs-12 mb-1">
                <input class="form-control {{ $invalid }}" name="foto" type="file" accept="image/png, image/gif, image/jpeg">
              </div>
            </div>
            @error('foto')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- KATA SANDI --}}
          <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            @php($invalid = $errors->has('kata_sandi') ? 'is-invalid' : '')
            <input type="text" name="kata_sandi" class="form-control {{ $invalid }}" value="{{ old('kata_sandi') }}" required>
            @error('kata_sandi')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- ULANGI KATA SANDI --}}
          <div class="mb-3">
            <label class="form-label">Ulangi Kata Sandi</label>
            @php($invalid = $errors->has('ulangi_kata_sandi') ? 'is-invalid' : '')
            <input type="text" name="ulangi_kata_sandi" class="form-control {{ $invalid }}" value="{{ old('ulangi_kata_sandi') }}" required>
            @error('ulangi_kata_sandi')
              <div class="small text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>

          @slot('formButton')
            <button type="button" class="btn btn-primary" id="buttonTambahBarang">Simpan</button>
          @endslot
        @endcomponent

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
                  @component('components.modal-form', ['modalId' => "modalEditPengguna$pengguna->id", 'modalSize' => 'modal-lg', 'formAction' => route('pengguna.update', ['pengguna' => $pengguna->id]), 'formId' => "formEditPengguna$pengguna->id", 'formFile' => true, 'modalTitle' => 'Edit Pengguna', 'formSubmit' => false])
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

                    {{-- KODE ASISTEN --}}
                    <div class="mb-3">
                      <label class="form-label">Kode Asisten</label>
                      @php($value = old('pengguna_id') == $pengguna->id ? old('kode_asisten') : $pengguna->kode_asisten)
                      @php($invalid = old('pengguna_id') == $pengguna->id && $errors->has('kode_asisten') ? 'is-invalid' : '')
                      <input type="text" name="kode_asisten" class="form-control {{ $invalid }}" value="{{ $value }}" required>
                      @if (old('pengguna_id') == $pengguna->id)
                        @error('kode_asisten')
                          <div class="small text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      @endif
                    </div>

                    {{-- NAMA LENGKAP --}}
                    <div class="mb-3">
                      <label class="form-label">Nama Lengkap</label>
                      @php($value = old('pengguna_id') == $pengguna->id ? old('nama_lengkap') : $pengguna->nama_lengkap)
                      @php($invalid = old('pengguna_id') == $pengguna->id && $errors->has('nama_lengkap') ? 'is-invalid' : '')
                      <input type="text" name="nama_lengkap" class="form-control {{ $invalid }}" value="{{ $value }}" required>
                      @if (old('pengguna_id') == $pengguna->id)
                        @error('nama_lengkap')
                          <div class="small text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      @endif
                    </div>

                    {{-- FOTO --}}
                    <div class="mb-3">
                      <label class="form-label">Foto</label>
                      @php($invalid = $errors->has('foto') ? 'is-invalid' : '')
                      <div class="row">
                        <div class="col-sm col-xs-12 mb-1">
                          <input class="form-control {{ $invalid }}" name="foto" type="file" accept="image/png, image/gif, image/jpeg">
                        </div>
                      </div>
                      @error('foto')
                        <div class="small text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>

                    {{-- KATA SANDI --}}
                    <div class="mb-3">
                      <label class="form-label">Kata Sandi</label>
                      @php($invalid = old('pengguna_id') == $pengguna->id && $errors->has('kata_sandi') ? 'is-invalid' : '')
                      <input type="password" name="kata_sandi" class="form-control {{ $invalid }}" value="" required>
                      @if (old('pengguna_id') == $pengguna->id)
                        @error('kata_sandi')
                          <div class="small text-danger">
                            {{ $message }}
                          </div>
                        @enderror
                      @endif
                    </div>

                    {{-- ULANGI KATA SANDI --}}
                    <div class="mb-3">
                      <label class="form-label">Ulangi Kata Sandi</label>
                      @php($invalid = old('pengguna_id') == $pengguna->id && $errors->has('ulangi_kata_sandi') ? 'is-invalid' : '')
                      <input type="password" name="ulangi_kata_sandi" class="form-control {{ $invalid }}" value="" required>
                      @if (old('pengguna_id') == $pengguna->id)
                        @error('ulangi_kata_sandi')
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
