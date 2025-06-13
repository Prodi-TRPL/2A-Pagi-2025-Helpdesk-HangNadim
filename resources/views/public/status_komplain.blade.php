@extends('layout.app')
@section('content')

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card shadow">
        <div class="card-body">
          <h4 class="card-title text-uppercase fw-bold">Status Komplain Anda</h4>
          <hr>

          <div class="row">
            <!-- Kiri: Detail -->
            <div class="col-md-9">
              <div class="mb-2">
                <small>Kode Tiket</small>
                <div class="fw-semibold">{{ $komplain->tiket }}</div>
              </div>

              <div class="mb-2">
                <small>Kategori Aduan</small>
                <div class="fw-semibold">{{ $komplain->kategori->nama_kategori ?? 'Tidak ada' }}</div>
              </div>

              <div class="mb-2">
                <small>Nama Pelapor</small>
                <div class="fw-semibold">{{ $komplain->pelapor->nama ?? 'Anonim' }}</div>
              </div>

              <div class="mb-2">
                <small>Tanggal Aduan</small>
                <div class="fw-semibold">{{ \Carbon\Carbon::parse($komplain->created_at)->translatedFormat('d F Y') }}</div>
              </div>

              <div class="mb-2">
                <small>Status</small>
                <div class="fw-semibold 
                  @if($komplain->status == 'Selesai') text-success
                  @elseif($komplain->status == 'Sedang Diproses') text-warning
                  @else text-secondary
                  @endif">
                  {{ $komplain->status }}
                </div>
              </div>
            </div>

            <!-- Kanan: Gambar Status -->
            <div class="col-md-3 d-flex align-items-center justify-content-center">
              @if($komplain->status_icon)
                <img src="" alt="status" class="img-fluid rounded">
              @else
                <span class="text-muted">Tidak ada gambar</span>
              @endif
            </div>
          </div>

          <div class="d-flex justify-content-end mt-3">
        <a href="{{ url('/') }}" class="btn btn-outline-primary">
          Kembali <i class="fas fa-arrow-right ms-1"></i>
        </a>
      </div>

        </div>
      </div>

      
    </div>
  </div>
</div>

@endsection
