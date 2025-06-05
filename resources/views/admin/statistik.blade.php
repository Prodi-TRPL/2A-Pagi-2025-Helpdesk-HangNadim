@extends('layout.admin')
@section('content')
            
<!-- Page Heading -->
<h1 class="h3 mb-2 font-weight-bold text-gray-900 ms-3">Dashboard</h1>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger  text-uppercase mb-1">
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
                <div class="text-xs font-weight-bold text-warning  text-uppercase mb-1">
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
      
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Admin Aktif</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">3 Admin</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-shield fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

<div class="row">
<div class="col-xl-8 col-lg-7">    <!-- Area Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
            
        </div>
    </div>

    <!-- Bar Chart -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <canvas id="myBarChart"></canvas>
            </div>
            <hr>
            
        </div>
    </div>

</div>

<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring Komplain</h6>
        </div>
        <!-- Card Body -->
      <!-- Card Body Tunggal -->
      <div class="card-body">
        <!-- Menunggu -->
        <div class="mb-4">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="d-flex align-items-center">
              <i class="fas fa-stopwatch me-2 text-gray-500"></i>
              <span class="text-md">Menunggu</span>
            </span>
            <span class="fs-6 font-weight-bold">50</span>
          </div>
          <div class="progress" style="height: 10px;">
            <div class="progress-bar bg-danger" style="width: 50%"></div>
          </div>
        </div>
      
        <!-- Diproses -->
        <div class="mb-4">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="d-flex align-items-center">
              <i class="fas fa-sync me-2 text-gray-500"></i>
              <span class="text-md">Diproses</span>
            </span>
            <span class="fs-6 font-weight-bold">25</span>
          </div>
          <div class="progress" style="height: 10px;">
            <div class="progress-bar bg-warning" style="width: 25%"></div>
          </div>
        </div>
      
        <!-- Selesai -->
        <div>
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="d-flex align-items-center">
              <i class="fas fa-check-circle me-2 text-gray-500"></i>
              <span class="text-md">Selesai</span>
            </span>
            <span class="fs-6 font-weight-bold">15</span>
          </div>
          <div class="progress" style="height: 10px;">
            <div class="progress-bar bg-success" style="width: 15%"></div>
          </div>
        </div>
      </div>
      
    </div>
</div>
@push('scripts')
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
@endpush
@endsection