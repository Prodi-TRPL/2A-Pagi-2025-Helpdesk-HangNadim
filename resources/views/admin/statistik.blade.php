@extends('layout.admin')
@section('content')
@section('navbar', 'Dashboard')
<style>
    #barChart {
        min-height: 300px;
    }
</style>
    
<div class="d-sm-flex align-items-center justify-content-between mb-3">
  <h1 class="h3 mb-0 fw-bold text-gray-900 ps-3">Dashboard</h1>
</div>
<!-- Content Row -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger  text-uppercase mb-1">
                  Komplain Masuk</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalKomplain}} Komplain</div>
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
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalSaran}} Saran</div>
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

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info  text-uppercase mb-1">Total Laporan Bulan Ini</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKomplain + $totalSaran}} Laporan</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    

<div class="row">

    <!-- Bar Chart -->
    <div class="card shadow mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary fw-bold">Statistik Komplain</h5>
    
        <form method="GET" action="#">
          <select class="form-select" name="tahun" id="tahun">
            @for ($tahun = 2020; $tahun <= now()->year; $tahun++)
              <option value="{{ $tahun }}" {{ $tahun == now()->year ? 'selected' : '' }}>{{ $tahun }}</option>
            @endfor
          </select>
      </form>

      </div>
      <div class="card-body">
        <div style="min-height: 300px;">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div>

</div>

</div>

@push('scripts')
<script src="{{ asset('js/demo/chart-bar.js') }}"></script>
@endpush

@endsection