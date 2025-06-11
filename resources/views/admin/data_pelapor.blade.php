@extends('layout.admin')
@section('content')
  <h1 class="h3 mb-2 font-weight-bold text-gray-900 ms-3">Data Pelapor</h1>

<div class="card shadow">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="tabel-data_pelpaor" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%;">
            <thead class="table-primary">
              <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">NO WhatsApp</th>
                <th class="text-center">Profesi</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ari</td>
                    <td>ari123@gmail.com</td>
                    <td>082267437645</td>
                    <td>Guru</td>

                </tr>
                <tr>
                    <td>Budi</td>
                    <td>Budi09@ gmail.com</td>
                    <td>089374625173</td>
                    <td>Dokter</td>

                </tr>
                <tr>
                    <td>Nana</td>
                    <td>Nana27@gmail.com</td>
                    <td>081302947527</td>
                    <td>Pengusaha</td>
                </tr>
              </tbody>
        </div>
      </div>
    </div>

    @push('scripts')
      <script>
    $(document).ready(function () {
  $('#tabel-data_pelpaor').DataTable({
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