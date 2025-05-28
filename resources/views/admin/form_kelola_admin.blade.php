@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Kelola Admin</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kelola.admin.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="form-nama">Nama:</label>
                    <input type="text" name="name" id="form-nama" class="form-control" value="{{ old('name') }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="form-email">Email:</label>
                    <input type="email" name="email" id="form-email" class="form-control" value="{{ old('email') }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="form-password">Password:</label>
                    <input type="password" name="password" id="form-password" class="form-control">
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="form-whatsapp">Whatsapp:</label>
                    <input type="text" name="whatsapp" id="form-whatsapp" class="form-control" value="{{ old('whatsapp') }}">
                    @error('whatsapp') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label for="form-role">Role:</label>
                    <select name="role" id="form-role" class="form-control">
                        <option hidden>------</option>
                        <option value="Officer">Officer</option>
                        <option value="Team Leader">Team Leader</option>
                        <option value="Manager">Manager</option>
                        <option value="Direktur">Direktur</option>
                    </select>
                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
