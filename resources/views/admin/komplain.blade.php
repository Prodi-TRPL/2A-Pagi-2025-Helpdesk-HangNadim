@extends('layout.admin')
@section('content')
@section('navbar', 'Daftar Komplain')


@if(session('success'))
  <x-alert type="success">
    {{ session('success') }}</x-alert>
@endif

<div class="card shadow">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="tabel-komplain" class="table table-bordered table-striped dt-responsive nowrap" style="width:100%">
            <thead class="table-primary">
              <tr>
                <th class="text-center">No Tiket</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Tanggal Masuk</th>
                <th class="text-center">Tingkatan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">Tingkat Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($komplains as $komplain)
              <tr>
                <td>{{ $komplain->tiket }}</td>
                <td>{{ $komplain->pelapor->nama }}</td>
                <td>{{ $komplain->kategori->nama_kategori }}</td>
                <td>{{ $komplain->created_at->format('Y-m-d') }}</td>

                <td>
                  <form action="{{ route('update.tingkat', $komplain->id) }}" method="POST"> 
                    @csrf @method('PATCH')
                    <select name="tingkat" class="form-select form-select-sm" onchange="this.form.submit()">
                      <option value="Rendah" {{ $komplain->tingkat == 'Rendah' ? 'selected' : ''}}>Rendah</option>
                      <option value="Sedang"{{ $komplain->tingkat == 'Sedang' ? 'selected' : ''}}>Sedang</option>
                      <option value="Tinggi" {{ $komplain->tingkat == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                  </form>
                </td>

                <td>
                    <select class="form-select form-select-sm">
                      <option hidden>{{ $komplain->status }}</option>
                      <option>Menunggu</option>
                      <option>Diproses</option>
                      <option>Selesai</option>
                    </select>
              </td>
                
              <td><a href="#" class="btn btn-primary btn-sm">Detail Keluhan</a></td>
              
              {{-- Helper Filter --}}
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