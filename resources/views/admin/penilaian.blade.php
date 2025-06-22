@extends('layout.admin')
@section('content')
@section('navbar', 'Daftar Penilaian')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
  <h1 class="h3 mb-0 fw-bold text-gray-900 ps-3">Daftar Penilaian</h1>
</div>
<div class="card shadow">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="tabel-penilaian" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%;">
            <thead class="table-primary">
              <tr>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Penilaian</th>
                <th class="text-center">Komentar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($penilaians as $penilaian)
                <tr>
                    <td>{{$penilaian->created_at->format('Y-m-d')}}</td>
                    <td>{{$penilaian->komplain->pelapor->nama}}</td>
                    <td>{{$penilaian->rating_text}}</td>
                    <td>{{$penilaian->feedback}}</td>
                </tr>
              @endforeach
            </tbody>
        </div>
      </div>
    </div>

    @push('scripts')
      <script>
    $(document).ready(function () {
  $('#tabel-penilaian').DataTable({
    responsive: true,
    
    language: {
      search: "Cari:",
      lengthMenu: "Tampilkan _MENU_ data",
      info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
      paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "→",
        previous: "←"
      },
      zeroRecords: "Tidak ada data ditemukan"
    }
  });
});
    </script>
    @endpush

@endsection