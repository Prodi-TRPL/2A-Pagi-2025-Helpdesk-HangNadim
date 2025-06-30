@extends('layout.admin')
@section('content')
@section('navbar', 'Daftar Saran')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
  <h1 class="h3 mb-0 fw-bold text-gray-900 ps-3">Daftar Saran</h1>
</div>

@if(session('success'))
    <x-alert type="success">
        {{ session('success') }}
    </x-alert>
  @endif
  
  <div class="card shadow">
    <div class="card-body">
      <div class="table-responsive">
        
        <table id="tabel-saran" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%;">
            <thead class="table-primary">
                <tr>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Tanggal</th>
                    <th class="text-center">Saran</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($sarans as $saran)
                <tr>
                  <td>{{ $saran->pelapor->nama }}</td>
                  <td>{{ $saran->created_at->format('Y-m-d') }}</td>
                  <td>{{  Str::limit($saran->message, 30, '') }}</td>
                  <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $saran->id }}"><i class="fas fa-info-circle"></i></button>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $saran->id }}">
                      <i class="fas fa-trash"></i>
                  </button>
                  </td>
                </tr>

              <x-modal id="modalDetail{{ $saran->id }}" title="Detail Penilaian">
                <div class="mb-3">
                    <strong>Saran:</strong>
                    <p class="text-muted">{{ $saran->message ?? 'Tidak ada komentar' }}</p>
                </div>

                <div>
                  <strong>Bukti:</strong>
                  @if($saran->bukti)
                    <div class="d-flex justify-content-center">
                      <a href="{{ asset('storage/' . $saran->bukti) }}" target="_blank">
                          <img src="{{ asset('storage/' . $saran->bukti) }}"
                              alt="Bukti Komplain"
                              class="img-fluid rounded shadow-sm"
                              style="max-width: 100%; max-height: 400px; object-fit: contain;">
                      </a>
                    </div>
                  @else
                    <p class="text-mute">Tidak ada</p>
                  @endif
                  </div>
              </x-modal>

              <x-modal id="modalHapus{{ $saran->id }}" title="Yakin ingin menghapus?">
                <p class="text-black">Saran: {{$saran->message}}</p>
                <x-slot name="footer">
                  <form action={{ route('saran.destroy', $saran->id) }} method="POST">
                      @csrf @method('DELETE')
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-outline-danger">Hapus</button>
                  </form>
                </x-slot>
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

