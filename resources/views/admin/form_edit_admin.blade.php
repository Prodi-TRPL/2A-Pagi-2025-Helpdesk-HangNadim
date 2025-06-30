@extends('layout.admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Admin</h1>

    <div class="card shadow mb-5">
        <div class="card-body">
            <form action="{{ route('kelola.admin.update', $user->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="form-nama">Nama:</label>
                    <input type="text" name="name" id="form-nama" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                    @error('name') <div class="invalid-feedback">{{ $message }} </div>@enderror
                </div>

                <div class="form-group">
                    <label for="form-email">Email:</label>
                    <input name="email" id="form-email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="form-password">Password:</label>
                    <input type="password" name="password" id="form-password" class="form-control  @error('password') is-invalid @enderror" value="{{ $user->password }}">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="form-whatsapp">Whatsapp:</label>
                    <input type="text" name="whatsapp" id="form-whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" value="{{ $user->whatsapp }}">
                    @error('whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="form-role">Role:</label>
                    <select name="role" id="form-role" class="form-control @error('role') is-invalid @enderror">
                        <option hidden>------</option>
                        <option value="Officer" {{ $user->role == 'Officer' ? 'selected' : ''}}>Officer</option>
                        <option value="Team Leader" {{ $user->role == 'Team Leader' ? 'selected' : ''}}>Team Leader</option>
                        <option value="Manager" {{ $user->role == 'Manager' ? 'selected' : ''}}>Manager</option>
                        <option value="Direktur" {{ $user->role == 'Direktur' ? 'selected' : ''}}>Direktur</option>
                    </select>
                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex flex-column flex-md-row gap-2 justify-content-md-between">
                    <a href="{{ route('kelola.admin') }}" class="btn btn-outline-secondary order-2 order-md-1">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary order-1 order-md-2">
                        <i class="fas fa-plus me-1"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
