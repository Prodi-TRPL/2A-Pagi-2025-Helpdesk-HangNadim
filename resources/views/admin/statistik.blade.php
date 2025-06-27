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
        <h5 class="mb-0 text-primary fw-bold">Statistik Status Komplain</h5>
    
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
    
    <div class="row">
      <!-- Pie Chart - Tingkatan Komplain -->
      <div class="col-md-6">
        <div class="card shadow mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-primary fw-bold fs-6">Tingkatan Komplain</h5>
            
            <form method="GET" action="#" class="d-flex gap-2">
              <select class="form-select" name="bulan" id="bulan">
                <option value="1" {{ now()->month == 1 ? 'selected' : '' }}>Januari</option>
                <option value="2" {{ now()->month == 2 ? 'selected' : '' }}>Februari</option>
                <option value="3" {{ now()->month == 3 ? 'selected' : '' }}>Maret</option>
                <option value="4" {{ now()->month == 4 ? 'selected' : '' }}>April</option>
                <option value="5" {{ now()->month == 5 ? 'selected' : '' }}>Mei</option>
                <option value="6" {{ now()->month == 6 ? 'selected' : '' }}>Juni</option>
                <option value="7" {{ now()->month == 7 ? 'selected' : '' }}>Juli</option>
                <option value="8" {{ now()->month == 8 ? 'selected' : '' }}>Agustus</option>
                <option value="9" {{ now()->month == 9 ? 'selected' : '' }}>September</option>
                <option value="10" {{ now()->month == 10 ? 'selected' : '' }}>Oktober</option>
                <option value="11" {{ now()->month == 11 ? 'selected' : '' }}>November</option>
                <option value="12" {{ now()->month == 12 ? 'selected' : '' }}>Desember</option>
              </select>
              <select class="form-select" name="tahun" id="tahun">
                @for ($tahun = 2020; $tahun <= now()->year; $tahun++)
                  <option value="{{ $tahun }}" {{ $tahun == now()->year ? 'selected' : '' }}>{{ $tahun }}</option>
                @endfor
              </select>
            </form>
          </div>
          <div class="card-body">
            <div style="min-height: 300px;">
              <canvas id="pieChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    
      <!-- column Chart - Kategori Komplain -->
      <div class="col-md-6">
        <div class="card shadow mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-primary fw-bold fs-6">Kategori Komplain</h5>
            
            <form method="GET" action="#" class="d-flex gap-2">
              <select class="form-select" name="bulan" id="bulan">
                <option value="1" {{ now()->month == 1 ? 'selected' : '' }}>Januari</option>
                <option value="2" {{ now()->month == 2 ? 'selected' : '' }}>Februari</option>
                <option value="3" {{ now()->month == 3 ? 'selected' : '' }}>Maret</option>
                <option value="4" {{ now()->month == 4 ? 'selected' : '' }}>April</option>
                <option value="5" {{ now()->month == 5 ? 'selected' : '' }}>Mei</option>
                <option value="6" {{ now()->month == 6 ? 'selected' : '' }}>Juni</option>
                <option value="7" {{ now()->month == 7 ? 'selected' : '' }}>Juli</option>
                <option value="8" {{ now()->month == 8 ? 'selected' : '' }}>Agustus</option>
                <option value="9" {{ now()->month == 9 ? 'selected' : '' }}>September</option>
                <option value="10" {{ now()->month == 10 ? 'selected' : '' }}>Oktober</option>
                <option value="11" {{ now()->month == 11 ? 'selected' : '' }}>November</option>
                <option value="12" {{ now()->month == 12 ? 'selected' : '' }}>Desember</option>
              </select>
              <select class="form-select" name="tahun" id="tahun">
                @for ($tahun = 2020; $tahun <= now()->year; $tahun++)
                  <option value="{{ $tahun }}" {{ $tahun == now()->year ? 'selected' : '' }}>{{ $tahun }}</option>
                @endfor
              </select>
            </form>
          </div>
          <div class="card-body">
            <div style="min-height: 300px;">
              <canvas id="columnChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</div>

</div>

@push('scripts')
<script src="{{ asset('js/demo/chart-bar.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie.js') }}"></script>
<script src="{{ asset('js/demo/chart-column.js') }}"></script>

@endpush

@endsection