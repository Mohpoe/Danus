{{-- Variabel:
  $modalId    = atribut id dari modal
  $modalSize  = ukuran modal (optional)
  $formAction = action dari form akan diarahkan kemana
  $formId     = atribut id dari form (optional)
  $formFile   = [boolean] apakah berupa form untuk file (optional)
  $modalTitle = judul modal
  $formSubmit = [boolean] apakah tombol submit ditampilkan atau tidak (optional)
  $formButton = [boolean] tombol custom (optional) --}}

<div class="modal fade" id="{{ $modalId }}" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog {{ $modalSize ?? '' }} modal-dialog-centered">
    <div class="modal-content">
      <form class="w-100" action="{{ $formAction }}" method="post" id={{ $formId ?? '' }} autocomplete="off"@if ($formFile ?? false) enctype="multipart/form-data"@endif>
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">{{ $modalTitle }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          {{ $slot }}
        </div>
        <div class="modal-footer">
          @if ($formSubmit ?? true)
            <button type="submit" class="btn btn-primary">Simpan</button>
          @endif
          {{ $formButton ?? '' }}
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
