@extends('layout.admin')
@section('content')
@section('navbar', 'Daftar Penilaian')

  <div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 fw-bold text-gray-900 ps-3">Daftar Penilaian</h1>
  </div>

    <div class="card shadow">
        <div class="card-body">
          <div class="table-responsive">
            <table id="tabel-penilaian" class="table table-hover align-middle nowrap w-100" style="width:100%;">
              <thead class="table-light">
                <tr class="align-middle">
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Penilaian</th>
                  <th class="text-center">Detail</th>
                </tr>
              </thead>
              <tbody>
                @foreach($penilaians as $penilaian)
                  <tr>
                    <td>{{ $penilaian->created_at->format('d M Y') }}</td>
                    <td>{{ $penilaian->komplain->pelapor->nama }}</td>
                    <td>{{ $penilaian->rating_text }}</td>
                    <td class="text-center">
                      <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $penilaian->id }}">
                        <i class="fas fa-info-circle"></i>
                      </button>
                    </td>
                  </tr>

                <x-modal id="modalDetail{{ $penilaian->id }}" title="Detail Penilaian">
                  <div class="mb-3">
                      <strong>Komentar:</strong>
                      <p class="text-muted">{{ $penilaian->feedback ?? 'Tidak ada komentar' }}</p>
                  </div>
                </x-modal>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>

    @push('scripts')
      <script>
    $(document).ready(function () {
  $('#tabel-penilaian').DataTable({
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