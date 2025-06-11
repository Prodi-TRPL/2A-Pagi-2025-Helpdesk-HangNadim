@extends('layout.admin')
@section('content')
  <h1 class="h3 mb-2 font-weight-bold text-gray-900 ms-3">Daftar Saran</h1>

  <div class="card shadow rounded-3" style="background: #ffffff; padding: 1.5rem; max-width: 1200px; margin: 0 auto;">
    <div class="card-body">
      <div class="table-responsive">
        
        <table id="tabel-saran" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%;">
            <thead class="table-primary">
                <tr>
                    <th class="text-center"style="width: 20%;">Tanggal</th>
                    <th class="text-center"style="width: 20%; max-width: 200px; white-space: normal; word-wrap: break-word;">Nama</th>
                    <th class="text-center"style="width: 60%; max-width: 400px; white-space: normal; word-wrap: break-word;">Saran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>15-03-2025</td>
                    <td style="white-space: normal; word-break: break-word; text-align: left; max-width: 200px;">
                        Rani
                    </td>
                    <td style="white-space: normal; word-break: break-word; text-align: left; max-width: 400px;">
                        Mohon ditambahkan lebih banyak kursi di area ruang tunggu domestik, terutama saat jam sibuk. Banyak penumpang harus berdiri cukup lama sebelum boarding karena tempat duduk penuh.
                    </td>
                </tr>
                <tr>
                  <td>01-01-2025</td>
                  <td style="white-space: normal; word-break: break-word; text-align: left; max-width: 200px;">
                    Devan
                  </td>
                  <td style="white-space: normal; word-break: break-word; text-align: left; max-width: 400px;">
                    Petugas lebih cepat merespon
                  </td>
                </tr>
                <tr>
                  <td>10-12-2024</td>
                  <td style="white-space: normal; word-break: break-word; text-align: left; max-width: 200px;">
                    Lalaaaa aaaaaaa aaaaaaaaa
                  </td>
                  <td style="white-space: normal; word-break: break-word; text-align: left; max-width: 400px;">
                    Mungkin bisa ditambah fitur jadwal keberangkatan
                  </td>
                </tr>
              </tbody>
        </table>
    </div>
    </div>
  </div>

  @push('styles')
  <style>
    /* Elegant font and neutral body color */
    #tabel-saran {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      color: #6b7280;
      font-size: 16px;
    }

    /* Ensure text wraps in Nama and Saran columns */
    #tabel-saran th:nth-child(2),
    #tabel-saran td:nth-child(2),
    #tabel-saran th:nth-child(3),
    #tabel-saran td:nth-child(3) {
      white-space: normal !important;
      word-wrap: break-word !important;
      word-break: break-word !important;
      text-align: left;
      vertical-align: top;
    }

    /* Padding and spacing tweaks for readability */
    #tabel-saran tbody td {
      padding: 1rem;
      vertical-align: top;
    }
  </style>
  @endpush

  @push('scripts')
  <script>
    $(document).ready(function () {
      $('#tabel-saran').DataTable({
        responsive: true,
        autoWidth: false,
        columnDefs: [
          { width: '20%', targets: 0 },
          { width: '20%', targets: 1 },
          { width: '60%', targets: 2 }
        ],
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

