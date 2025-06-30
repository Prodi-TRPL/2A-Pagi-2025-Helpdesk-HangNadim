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
          <h4 class="card-title text-uppercase fw-bold text-center">Status Komplain Anda</h4>
          <hr>

          {{-- Baris Utama: Detail + Gambar --}}
          <div class="row">
            {{-- Kiri: Detail --}}
            <div class="col-md-8 order-2 order-md-1">
              <div class="mb-3">
                <small class="text-primary">Kode Tiket</small>
                <div class="fw-semibold">{{ $komplain->tiket }}</div>
              </div>

              <div class="mb-3">
                <small class="text-primary">Kategori Aduan</small>
                <div class="fw-semibold">{{ $komplain->kategori->nama_kategori }}</div>
              </div>

              <div class="mb-3">
                <small class="text-primary">Tanggal Aduan</small>
                <div class="fw-semibold">{{ \Carbon\Carbon::parse($komplain->created_at)->translatedFormat('d F Y') }}</div>
              </div>

              <div class="mb-3">
                <small class="text-primary">Deskripsi Penyelesaian:</small>
                <div class="fw-semibold">{{ $komplain->deskripsi_penyelesaian ?? '-' }}</div>
              </div>

              <div class="mb-3">
                <small class="text-primary">Bukti Penyelesaian:</small>
                <div class="d-flex justify-content-center">
                  @if($komplain->bukti_penyelesaian)
                    <a href="{{ asset('storage/' . $komplain->bukti_penyelesaian) }}" target="_blank">
                      <img src="{{ asset('storage/' . $komplain->bukti_penyelesaian) }}"
                          alt="Bukti Komplain"
                          class="img-fluid rounded shadow-sm"
                          style="max-width: 100%; max-height: 400px; object-fit: contain;">
                    </a>
                  @else
                    <div class="text-muted">Tidak ada foto untuk penyelesaian</div>
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
                    title="Terima Kasih Atas Penilaian Anda!"
                    subtitle="Masukan Anda sangat berarti untuk peningkatan layanan kami.">
                    <div class="card shadow-sm mb-3">
                      <div class="card-header bg-primary text-white fw-bold">Detail Penilaian</div>
                      <div class="card-body">
                        <div class="mb-2"><strong>Tiket:</strong> {{ $komplain->tiket }}</div>
                        <div class="mb-2"><strong>Nama:</strong> {{ $komplain->pelapor->nama }}</div>
                        <div class="mb-2"><strong>Tingkat Kepuasan:</strong> {{ $komplain->penilaian->rating_text }}</div>
                        @if($komplain->penilaian->feedback)
                          <div class="mb-2"><strong>Komentar:</strong> {{ $komplain->penilaian->feedback }}</div>
                        @endif
                      </div>
                    </div>
                  </x-feedback>
                @else
                  <h5 class="fw-bold mb-3 text-center">Berikan Penilaian Anda</h5>
                    <form method="POST" action="{{ route('penilaian.submit', $komplain->tiket) }}" novalidate>
                      @csrf
                      <div class="mb-3">
                       <div class="mb-4 text-center">
                        <label class="form-label fw-bold">Tingkat Kepuasan:</label>
                        <div class="rating">
                          @for($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}/>
                            <label for="star{{ $i }}"><i class="fas fa-star"></i></label>
                          @endfor
                        </div>
                        @error('rating') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                      </div>
                        @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                      
                      <div class="mb-3">
                        <label for="feedback" class="form-label">Komentar:</label>
                        <textarea name="feedback" id="feedback" rows="5" class="form-control @error('feedback') is-invalid @enderror">{{ old('feedback') }}</textarea>
                        @error('feedback')<div class="invalid-feedback">{{ $message }}</div>@enderror
                      </div>
                      
                      <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                          <i class="fas fa-paper-plane me-1"></i> Kirim Penilaian
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
                    Kembali <i class="fas fa-arrow-right ms-1"></i>
            </a>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
