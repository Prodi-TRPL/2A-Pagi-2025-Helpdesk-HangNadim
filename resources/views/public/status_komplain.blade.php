@extends('layout.app')
@section('content')
<style>
.rating {
  direction: rtl;
  unicode-bidi: bidi-override;
  font-size: 2rem;
  display: flex;
  justify-content: center;
}
.rating input {
  display: none;
}
.rating label {
  color: #ccc;
  cursor: pointer;
}
.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
  color: #ffc107; /* Warna bintang aktif */
}
</style>

<div class="container mt-5 flex-grow-1 py-5 d-flex flex-column justify-content-center">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow">
        <div class="card-body">
          <h4 class="card-title text-uppercase fw-bold text-center">{{ __('messages.status') }}</h4>
          <hr>

          {{-- Baris Utama: Detail + Gambar --}}
          <div class="row">
            {{-- Kiri: Detail --}}
            <div class="col-md-8 order-2 order-md-1">
              <div class="mb-3">
                <small class="text-primary">{{ __('messages.ticket') }}</small>
                <div class="fw-semibold">{{ $komplain->tiket }}</div>
              </div>

              <div class="mb-3">
                <small class="text-primary">{{ __('messages.komplain_category') }}</small>
                <div class="fw-semibold">{{ $komplain->kategori->nama_kategori }}</div>
              </div>

              <div class="mb-3">
                <small class="text-primary">{{ __('messages.date') }}</small>
                <div class="fw-semibold">{{ ($komplain->created_at)->translatedFormat('d F Y') }}</div>
              </div>

              <div class="mb-3">
                <small class="text-primary">{{ __('messages.desc') }}</small>
                <div class="fw-semibold">{{ $komplain->deskripsi_penyelesaian ?? '-' }}</div>
              </div>

              <div class="mb-3">
                <small class="text-primary">{{ __('messages.evidence') }}</small>
                <div class="d-flex justify-content-center">
                  @if($komplain->bukti_penyelesaian)
                    <a href="{{ asset('storage/' . $komplain->bukti_penyelesaian) }}" target="_blank">
                      <img src="{{ asset('storage/' . $komplain->bukti_penyelesaian) }}"
                          alt="Bukti Komplain"
                          class="img-fluid rounded shadow-sm"
                          style="max-width: 100%; max-height: 400px; object-fit: contain;">
                    </a>
                  @else
                    <div class="text-muted">{{ __('messages.photo') }}</div>
                  @endif
                </div>
              </div>

              <div class="mb-3">
                <small class="text-primary">Status</small>
                <div class="fw-semibold 
                  @if($komplain->status == 'Selesai') text-success
                  @elseif($komplain->status == 'Diproses') text-warning
                  @else text-danger
                  @endif">
                  {{ $komplain->status }}
                </div>
              </div>
            </div>

            {{-- Kanan: Gambar Status --}}
            <div class="col-md-4 order-1 order-md-2 d-flex justify-content-center align-items-start mb-3 mb-md-0">
              @if($komplain->status == 'Selesai')
                <img src="{{ asset('img/selesai.svg') }}" alt="Status" class="img-fluid" style="max-height: 250px;">
              @elseif($komplain->status == 'Diproses')
                <img src="{{ asset('img/proses.svg') }}" alt="Status" class="img-fluid" style="max-height: 250px;">
              @else
                <img src="{{ asset('img/status_menunggu.svg') }}" alt="Status" class="img-fluid" style="max-height: 250px;">
              @endif
            </div>
          </div>

          {{-- Form Penilaian --}}
          @if($komplain->status == 'Selesai')
            <hr class="my-4">
            <div class="row justify-content-center">
              <div class="col-md-10">
                @if($komplain->penilaian)
                  <x-feedback 
                    title="{{ __('messages.thanks_penilaian') }}"
                    subtitle="{{ __('messages.means') }}"
                    :card="false" 
                    :showImage="false" 
                    :showButton="false">
                    <div class="card shadow-sm mb-3">
                      <div class="card-header bg-primary text-white fw-bold">{{ __('messages.rating_detail') }}</div>
                      <div class="card-body">
                        <div class="row mb-2">
                          <div class="col-md-6"><strong>{{ __('messages.tiket') }}</strong></div> 
                          <div class="col-md-6">{{ $komplain->tiket }}</div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-6"><strong>{{ __('messages.name') }}</strong></div> 
                          <div class="col-md-6">{{ $komplain->pelapor->nama }}</div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-md-6"><strong>{{ __('messages.satisfaction') }}</strong></div> 
                          <div class="col-md-6">{{ $komplain->penilaian->rating_text }}</div>
                        </div>
                        @if($komplain->penilaian->feedback)
                          <div class="row mb-2">
                            <div class="col-md-6"><strong>{{ __('messages.comment') }}</strong></div> 
                            <div class="col-md-6">{{ $komplain->penilaian->feedback }}</div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </x-feedback>
                @else
                  <h5 class="fw-bold mb-3 text-center text-primary">{{ __('messages.rating_feedback') }}</h5>
                  <form method="POST" action="{{ route('penilaian.submit', $komplain->tiket) }}" novalidate>
                    @csrf
                    <div class="mb-3">
                      <div class="mb-4 text-center">
                        <label class="form-label fw-bold">{{ __('messages.satisfaction') }}</label>
                        <div class="rating">
                          @for($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}/>
                            <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
                          @endfor
                        </div>
                        @error('rating') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <label for="feedback" class="form-label">{{ __('messages.komen') }}</label>
                      <textarea name="feedback" id="feedback" rows="5" class="form-control @error('feedback') is-invalid @enderror">{{ old('feedback') }}</textarea>
                      @error('feedback') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-1"></i> {{ __('messages.submit2') }}
                      </button>
                    </div>
                  </form>
                @endif
              </div>
            </div>
          @endif
          
          {{-- Tombol Kembali --}}
          <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">
              {{ __('messages.back') }} <i class="fas fa-arrow-right ms-1"></i>
            </a>
          </div>

        </div> {{-- card-body --}}
      </div> {{-- card --}}
    </div> {{-- col-md-10 --}}
  </div> {{-- row --}}
</div> {{-- container --}}

@endsection
