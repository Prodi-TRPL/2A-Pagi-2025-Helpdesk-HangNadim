@extends('layout.admin')
@section('content')
@section('navbar', 'Dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
  <h1 class="h3 mb-0 fw-bold text-gray-900 ps-3">Dashboard</h1>
</div>
<!-- Content Row -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-info  text-uppercase mb-1">
                  Komplain Masuk</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">25 Komplain</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-warning  text-uppercase mb-1">
                  Saran diterima</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">18 Saran</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-lightbulb fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
     
<div class="row">

    <!-- Bar Chart -->
    <div class="card shadow mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary fw-bold text-gray-900">Statistik Komplain</h5>
    
        <form method="GET" action="{{ route('statistik') }}">
          <select class="form-select" name="tahun" id="tahun" onchange="this.form.submit()">
            @foreach ($list_tahun as $tahun)
                <option value="{{ $tahun }}" {{ $tahun == $tahun_terpilih ? 'selected' : '' }}>
                    {{ $tahun }}
                </option>
            @endforeach
        </select>
        
        </form>
      </div>
      <div class="card-body">
        <div style="min-height: 300px;">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div>
        
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
    const ctx = document.getElementById('barChart').getContext('2d');
    
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [
                {
                    label: 'Menunggu',
                    data: [20, 30, 15, 25, 40, 35, 15, 20, 25, 30, 40, 30],
                    backgroundColor: '#f7b073' 
                },
                {
                    label: 'Diproses',
                    data: [15, 25, 10, 20, 35, 30, 25, 30, 15, 20, 25, 40],
                    backgroundColor: '#7ed7eb' 
                },
                {
                    label: 'Selesai',
                    data: [15, 5, 25, 5, 35, 5, 10, 20, 15, 30, 35, 25, 15],
                    backgroundColor: '#aed886'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
  <style>
    #barChart {
        min-height: 300px;
    }
  </style>    

</div>

    @foreach ($komplains as $komplain)  
  <div class="col-12 col-md-6 col-lg-4 mb-5">
    <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 bg-primary" style="width: 4px; height: 100%;"></div>
        <div class="card-body p-4">
            <div class="d-flex align-items-start justify-content-between mb-3">
                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                    <i class="bi bi-person-check text-success fs-5"></i>
                </div>
                <small class="text-muted">2 menit lalu</small>
            </div>
            <h6 class="card-title fw-semibold mb-2">User Baru Terdaftar</h6>
            <p class="card-text text-muted small mb-3">Ahmad Rizky berhasil mendaftar sebagai member baru platform</p>
            <div class="d-flex align-items-center">
                <span class="badge bg-success bg-opacity-10 text-success small">
                    <i class="bi bi-check-circle me-1"></i>
                    Aktif
                </span>
            </div>
        </div>
    </div>
</div>

@endforeach

@push('scripts')
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
@endpush
@endsection