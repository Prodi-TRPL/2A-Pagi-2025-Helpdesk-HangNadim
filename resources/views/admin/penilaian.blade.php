@extends('layout.admin')
@section('content')
  <h1 class="h3 mb-2 font-weight-bold text-gray-900 ms-3">Daftar Penilaian</h1>

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
                <tr>
                    <td>12-02-2025</td>
                    <td>Ari</td>
                    <td>Memuaskan</td>
                    <td>Secara keseluruhan memuaskan</td>
                </tr>
                <tr>
                    <td>21-01-2025</td>
                    <td>Budi</td>
                    <td>Sangat Puas</td>
                    <td>Pelayanan sangat cepat dan memuaskan</td>
                </tr>
                <tr>
                    <td>11-01-2025</td>
                    <td>Nana</td>
                    <td>Cukup</td>
                    <td>Cukup baik</td>
                </tr>
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