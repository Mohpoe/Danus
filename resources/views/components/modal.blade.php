{{-- Variabel:
  $modalId      = atribut id dari modal
  $modalSize    = ukuran modal (optional)
  $modalTitle   = judul modal
  $modalButton  = tombol tambahan (optional) --}}

<div class="modal fade" id="{{ $modalId }}" data-bs-keyboard="true" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered {{ $modalSize ?? '' }}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $modalTitle }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      <div class="modal-footer">
        {{ $modalButton ?? '' }}
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
