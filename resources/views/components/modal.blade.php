@props(['id', 'title'])

<div class="modal fade" tabindex="-1" id="{{ $id }}">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        {{ $slot }}
      </div>

      @isset($footer)
      <div class="modal-footer">
        {{ $footer }}
      </div>
      @endisset

    </div>
  </div>
</div>
