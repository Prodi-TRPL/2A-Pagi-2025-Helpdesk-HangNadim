@extends('layout.admin')
@section('content')
@section('navbar', 'Data Pelapor')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 fw-bold text-gray-900 ps-3">Data Pelapor</h1>
</div>
<div class="card shadow">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="tabel-data_pelapor" class="table table-hover align-middle nowrap w-100" style="width:100%;">
            <thead class="table-light">
              <tr class="align-middle">
                <th>Nama</th>
                <th>Email</th>
                <th>WhatsApp</th>
                <th>Pekerjaan</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pelapors as $pelapor)
                <tr>
                  <td>{{ $pelapor->nama }}</td>
                  <td class="text-primary">{{ $pelapor->email }}</td>
                  <td class="text-primary">{{ $pelapor->whatsapp }}</td>
                  <td>{{ $pelapor->pekerjaan }}</td>
                  <td>{{ $pelapor->umur }}</td>
                  <td>{{ $pelapor->gender }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    @push('scripts')
      <script>
    $(document).ready(function () {
  $('#tabel-data_pelapor').DataTable({
    responsive: true,
    ordering: false,
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