@extends('layout.admin')
@section('content')
  <h1 class="h3 mb-2 font-weight-bold text-gray-900 ms-3">Kelola Admin</h1>
  <div class="modal fade" tabindex="-1" id="modalAdmin">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<div class="card shadow">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="tabel-kelola_admin" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%;">
            <thead class="table-primary">
              <tr>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Role</th>
                <th class="text-center">Password</th>
                <th class="text-center">Aksi</th>

              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rina Wijaya</td>
                    <td>rina@example</td>
                    <td>Team Leader</td>
                    <td>********</td>
                    <td>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#modalAdmin">detail</button>
                    </td>
                </tr>
                <tr>
                    <td>Budi Santoso</td>
                    <td>budi@example</td>
                    <td>Officer</td>
                    <td>********</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Siti Lestari</td>
                    <td>siti@example</td>
                    <td>Officer</td>
                    <td>********</td>
                    <td></td>
                </tr>
              </tbody>
        </div>
      </div>
    </div>

    @push('scripts')
      <script>
    $(document).ready(function () {
  $('#tabel-kelola_admin').DataTable({
    responsive: true
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