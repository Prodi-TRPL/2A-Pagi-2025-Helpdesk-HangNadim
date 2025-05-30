@extends('layout.admin')
@section('content')
<div class="card shadow">
      <div class="card-body">
        <h5 class="card-title">Daftar Komplain</h5>

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
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($komplains as $komplain)
              <tr>
                <td>{{ $komplain->tiket }}</td>
                <td>{{ $komplain->pelapor->nama }}</td>
                <td>{{ $komplain->kategori->nama_kategori }}</td>
                <td>{{ $komplain->created_at }}</td>
                <td><select class="form-select form-select-sm">
                    <option hidden>{{ $komplain->tingkat }}</option>
                    <option>Rendah</option>
                    <option>Sedang</option>
                    <option>Tinggi</option>
                </select></td>
                <td><select class="form-select form-select-sm">
                    <option hidden>{{ $komplain->status }}</option>
                    <option >Menunggu</option>
                    <option >Diproses</option>
                    <option >Selesai</option>
                </select></td>
                <td><a href="#" class="btn btn-primary btn-sm">Detail Keluhan</a></td>
                 <td>{{ $komplain->status_order }}</td>
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
  $('#tabel-komplain').DataTable({
    responsive: true,
    order: [[7, 'asc'], [3, 'asc']],
    columnDefs: [
      {
        targets: 7,
        visible: false,
        searchable: false
      }
    ],
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