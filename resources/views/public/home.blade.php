@extends('layout.app')
@section('content')

<!-- Hero Section -->
<section class="text-white pt-5 position-relative" id="home" style="background: url('hangnadim2.jpg') no-repeat center center; background-size: cover;">

    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                background-color: rgba(0, 0, 0, 0.541); z-index: 1;"></div>
    
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(63, 63, 63, 0.422); z-index: 1;"></div>

    <!-- Isi Konten -->
    <div class="container pt-4 mt-4 position-relative" style="z-index: 2; font-family:Segoe UI', sans-serif">
        <div class="row align-items-center py-5">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-4">Solusi Komplain Digital Bandara Hang Nadim</h1>
                <p class="lead mb-5">
                    NadimDesk memudahkan Anda menangani laporan pelanggan dengan cepat, akurat, dan profesional<br>
                    Demi pengalaman pelanggan yang semakin baik.
                </p>
        
                <div class="d-flex gap-2 flex-wrap">
                    <a href="#komplain" class="btn btn-outline-light btn-lg mb-2 rounded-pill">Ajukan Komplain</a>
                    <a href="#saran" class="btn btn-outline-light btn-lg mb-2 rounded-pill">Berikan Saran</a>
                </div>
            
            </div>  
            <div class="col-lg-6 d-flex justify-content-center">
                <!-- Gambar kalau mau -->
                <!-- <img src="/api/placeholder/500/500" alt="App Preview" class="img-fluid rounded shadow my-5"> -->
            </div>
        </div>
    </div>

    <div class="bg-white text-primary py-5 position-relative shadow-sm" style="z-index: 5; font-family:Segoe UI', sans-serif">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h2 class="fw-bold text-primary-emphasis">15K+</h2>
                    <p class="text-muted">Komplain Terselesaikan</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h2 class="fw-bold text-primary-emphasis">98%</h2>
                    <p class="text-muted">Tingkat Penyelesaian</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h2 class="fw-bold text-primary-emphasis">24 Jam</h2>
                    <p class="text-muted">Respons Rata-rata</p>
                </div>
            </div>
        </div>
    </div>

</section>


  <!-- Features Section -->
  <style>
    .feature-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .feature-card:hover {
        transform: scale(1.05) rotateX(2deg);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
        z-index: 2;
    }
</style>

  <section class="bg-light py-1" id="features">
      <div class="container py-5" style="font-family:Segoe UI', sans-serif;">
          <div class="text-center mb-5">
              <h2 class="fw-bold mb-4">Lacak Komplain Anda</h2>
              <p class="lead text-muted">Pantau status komplain Anda dengan mudah dan transparan</p>
          </div>
          <div class="row g-4">
              <div class="col-md-4">
                <div class="card feature-card border-0 shadow-sm h-100 text-center p-4">
                    <div class="card-body">
                          <div class="bg-primary bg-gradient text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                              <i class="fas fa-file-alt fa-2x"></i>
                          </div>
                          <h5 class="card-title fw-bold">Registrasi Komplain</h5>
                          <p class="card-text text-muted">Daftarkan komplain Anda dengan cepat dan mudah melalui sistem kami</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="card feature-card border-0 shadow-sm h-100 text-center p-4">
                    <div class="card-body">
                          <div class="bg-primary bg-gradient text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                              <i class="fas fa-search fa-2x"></i>
                          </div>
                          <h5 class="card-title fw-bold">Lacak Proses</h5>
                          <p class="card-text text-muted">Pantau status komplain Anda secara real-time dengan nomor tiket</p>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="card feature-card border-0 shadow-sm h-100 text-center p-4">
                    <div class="card-body">
                          <div class="bg-primary bg-gradient text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                              <i class="fas fa-check-circle fa-2x"></i>
                          </div>
                          <h5 class="card-title fw-bold">Penyelesaian</h5>
                          <p class="card-text text-muted">Dapatkan solusi dan penyelesaian yang memuaskan untuk setiap masalah</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Options Section -->
  <section class="py-1" id="options" style="font-family:Segoe UI', sans-serif">
      <div class="container py-4">
          <div class="text-center mb-4">
              <h2 class="fw-bold mb-3">Ajukan Komplain & Saran Anda</h2>
              <p class="lead text-muted">Kami menghargai masukan Anda untuk peningkatan layanan</p>
          </div>
          <div class="row g-4">
              <div class="col-lg-6">
                  <div class="card h-100 border-0 shadow-sm">
                      <div id="komplain" class="card-body p-5 shadow-sm">
                          <div class="text-center mb-5">
                              <div class="bg-primary bg-gradient text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                  <i class="fas fa-thumbs-up fa-2x"></i>
                              </div>
                              <h3 class="fw-bold">Komplain</h3>
                              <p class="text-muted mb-4">Berikan Komplain Anda</p>
                          </div>
                          <ul class="list-group list-group-flush mb-5">
                              <li class="list-group-item border-0 ps-0"><i class="fas fa-check text-primary me-2"></i> Respon cepat dari tim kami</li>
                              <li class="list-group-item border-0 ps-0"><i class="fas fa-check text-primary me-2"></i> Solusi yang efektif</li>
                              <li class="list-group-item border-0 ps-0"><i class="fas fa-check text-primary me-2"></i> Komunikasi yang baik</li>
                              <li class="list-group-item border-0 ps-0"><i class="fas fa-check text-primary me-2"></i> Hasil yang memuaskan</li>
                          </ul>
                          <div class="text-center">
                              <a href="{{ route('komplain.form') }}" class="btn btn-primary btn-lg w-100 rounded-pill text-white btn-hover">Laporkan Komplain Anda</a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="card h-100 border-0 shadow-sm">
                      <div id="saran" class="card-body p-5 shadow-sm">
                          <div class="text-center mb-4">
                              <div class="bg-primary bg-gradient text-white rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                  <i class="fas fa-comments fa-2x"></i>
                              </div>
                              <h3 class="fw-bold">Punya Saran</h3>
                              <p class="text-muted mb-4">Bagikan ide untuk perbaikan layanan</p>
                          </div>
                          <ul class="list-group list-group-flush mb-5">
                              <li class="list-group-item border-0 ps-0"><i class="fas fa-check text-primary me-2"></i> Usulan fitur baru</li>
                              <li class="list-group-item border-0 ps-0"><i class="fas fa-check text-primary me-2"></i> Saran perbaikan sistem</li>
                              <li class="list-group-item border-0 ps-0"><i class="fas fa-check text-primary me-2"></i> Masukan untuk tim layanan</li>
                              <li class="list-group-item border-0 ps-0"><i class="fas fa-check text-primary me-2"></i> Ide untuk pengembangan</li>
                          </ul>
                          <div class="text-center">
                              <a href="{{ route('saran.form') }}" class="btn btn-primary btn-lg w-100 rounded-pill text-white btn-hover">Kirim Saran</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

@endsection