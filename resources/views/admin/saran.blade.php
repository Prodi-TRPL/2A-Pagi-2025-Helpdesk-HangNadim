@extends('layout.admin')
@section('content')
@section('navbar', 'Daftar Saran')

  <div class="card shadow">
    <div class="card-body">
      <div class="table-responsive">
        
        <table id="tabel-saran" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%;">
            <thead class="table-primary">
                <tr>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Tanggal</th>
                    <th class="text-center">Saran</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($sarans as $saran)
                <tr>
                  <td>
                    {{ $saran->pelapor->nama }}
                  </td>
                  <td>
                    {{ $saran->created_at->format('Y-m-d') }}
                  </td>
                  <td>
                    {{  Str::limit($saran->message, 30, '') }}
                  </td>
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

