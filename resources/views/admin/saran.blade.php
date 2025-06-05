@extends('layout.admin')
@section('content')
  <h1 class="h3 mb-2 font-weight-bold text-gray-900 ms-3">Daftar Saran</h1>

<div class="card shadow">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="tabel-komplain" class="table table-bordered text-center table-striped dt-responsive nowrap" style="width:100%">
            <thead class="table-primary">
                <tr>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Saran</th>
                </tr>
              </thead>
              
            <tbody>
              <tr>
                <td>15-03--2025</td>
                <td>Rani</td>
                <td>Mohon ditambahkan lebih banyak kursi di area ruang tunggu domestik, terutama saat jam sibuk. Banyak penumpang harus berdiri cukup lama sebelum boarding karena tempat duduk penuh."
                </td>
              </tr>
              <tr>
                <td>01-01-2025</td>
                <td>Devan</td>
                <td>Petugas lebih cepat merespon</td>
              </tr>
              <tr>
                <td>10-12-2024</td>
                <td>Lalaaaa aaaaaaa aaaaaaaaa</td>
                <td>Mungkin bisa ditambah fitur jadwal keberangkatan</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    @push('scripts')
      <script>
    $(document).ready(function () {
<<<<<<< HEAD
      $('#tabel-komplain').DataTable({
=======
      $('#tabel-saran').DataTable({
>>>>>>> b4fc2925b2047763497b192a3bec57126a93d323
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