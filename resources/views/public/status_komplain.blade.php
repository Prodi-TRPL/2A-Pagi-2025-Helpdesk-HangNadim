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
                <small class="text-primary">Kode Tiket</small>
                <div class="fw-semibold">{{ $komplain->tiket }}</div>
              </div>

              <div class="mb-2">
                <small class="text-primary">Kategori Aduan</small>
                <div class="fw-semibold">{{ $komplain->kategori->nama_kategori}}</div>
              </div>

              <div class="mb-2">
                <small class="text-primary">Tanggal Aduan</small>
                <div class="fw-semibold">{{ \Carbon\Carbon::parse($komplain->created_at)->translatedFormat('d F Y') }}</div>
              </div>
              
              <div class="mb-2">
                <small class="text-primary">Deskripsi Penyelesaian:</small>
                <div class="fw-semibold">{{ $komplain->deskripsi_penyelesaian ?? '-' }}</div>
              </div>

              <div class="mb-2">
                      <small class="text-primary">Bukti:</small>
                    <div class="d-flex justify-content-center">
                      <a href="{{ asset('storage/' . $komplain->bukti_penyelesaian) }}" target="_blank">
                          <img src="{{ asset('storage/' . $komplain->bukti_penyelesaian) }}"
                              alt="Bukti Komplain"
                              class="img-fluid rounded shadow-sm"
                              style="max-width: 100%; max-height: 400px; object-fit: contain;">
                      </a>
                    </div>
                  </div>

              <div class="mb-2">
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

            <div class="col-md-3 d-flex align-items-center justify-content-center">
              @if($komplain->status == 'Selesai')
                <img src="{{ asset('img/selesai.svg') }}" alt="Status" class="img-fluid rounded">
              @elseif($komplain->status == 'Diproses')
                <img src="{{ asset('img/proses.svg') }}" alt="Status" class="img-fluid rounded">
              @else
                <img src="{{ asset('img/status_menunggu.svg') }}" alt="Status" class="img-fluid rounded">
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
