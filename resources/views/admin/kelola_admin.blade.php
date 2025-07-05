@extends('layout.admin')
@section('content')
@section('navbar', 'Kelola Admin')

<div class="d-flex justify-content-between align-items-center mb-3 px-3">
  <h1 class="h3 mb-0 fw-bold text-gray-900">Kelola Admin</h1>
  <a href="{{ route('kelola.admin.form') }}" class="btn btn-success btn-sm">
    <i class="fas fa-user-plus"></i> Tambah Akun
  </a>
</div>

@if(session('success'))
    <x-alert type="success">
        {{ session('success') }}
    </x-alert>
  @endif
 
  <div class="card shadow mb-5">
  <div class="card-body">
    <div class="table-responsive ">
      <table id="tabel-kelola_admin" class="table table-hover align-middle nowrap w-100" style="width:100%;">
    <thead class="table-light">      
        <tr class="align-middle">
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>WhatsApp</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->whatsapp }}</td>
                <td class="text-center">
                    <a href="{{ route('kelola.admin.edit', $user->id) }}" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-pen"></i>
                    </a>               
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdmin{{ $user->id }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>

            <x-modal id="modalAdmin{{ $user->id }}" title="Yakin ingin menghapus?">
                <p class="text-black">Nama: {{ $user->name }}</p>
                <p class="text-black">Email: {{ $user->email }}</p>

                <x-slot name="footer">
                    <form action="{{ route('kelola.admin.destroy', $user->id) }}" method="POST">
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
  $('#tabel-kelola_admin').DataTable({
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