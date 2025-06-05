@extends('layout.admin')
@section('content')
  <h1 class="h3 mb-2 font-weight-bold text-gray-900 ms-3">Daftar Komplain</h1>

<div class="card shadow">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="tabel-komplain" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%">
            <thead class="table-primary">
              <tr>
                <th>No Tiket</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Tanggal Masuk</th>
                <th>Tingkatan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1092gya0</td>
                <td>Budi</td>
                <td>Pelayanan</td>
                <td>12-04-2025</td>
                <td><select class="form-select form-select-sm">
                    <option hidden>Tingkatan</option>
                    <option>Ringan</option>
                    <option>Sedang</option>
                    <option>Berat</option>
                </select></td>
                <td><select class="form-select form-select-sm">
                    <option hidden>Status</option>
                    <option >Menunggu</option>
                    <option >Diproses</option>
                    <option >Selesai</option>
                </select></td>
                <td><a href="#" class="btn btn-primary btn-sm">Detail Keluhan</a></td>
              </tr>
              <tr>
                <td>0ka7e2j8</td>
                <td>Nana</td>
                <td>Keamanan</td>
                <td>09-04-2025</td>
                <td><select class="form-select form-select-sm"><option>Tingkatan</option></select></td>
                <td><select class="form-select form-select-sm"><option>Status</option></select></td>
                <td><a href="#" class="btn btn-primary btn-sm">Detail Keluhan</a></td>
              </tr>
              <tr>
                <td>1m0s6va</td>
                <td>Raya</td>
                <td>Fasilitas</td>
                <td>05-04-2025</td>
                <td><select class="form-select form-select-sm"><option>Tingkatan</option></select></td>
                <td><select class="form-select form-select-sm"><option>Status</option></select></td>
                <td><a href="#" class="btn btn-primary btn-sm">Detail Keluhan</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    @push('scripts')
      <script>
    $(document).ready(function () {
      $('#tabel-komplain').DataTable({
        responsive: true,
        language: {
          search: "Cari:  ",
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