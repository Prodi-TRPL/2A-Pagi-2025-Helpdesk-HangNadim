@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Kelola Admin</h1>

    @if(session('success'))
        <x-alert type="success">
            {{ session('success') }}
        </x-alert>
    @elseif(session('error'))
        <x-alert type="error">
            {{ session('error') }}
        </x-alert>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kelola.admin.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="form-nama">Nama:</label>
                    <input type="text" name="name" id="form-nama" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }} </div>@enderror
                </div>

                <div class="form-group">
                    <label for="form-email">Email:</label>
                    <input type="email" name="email" id="form-email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="form-password">Password:</label>
                    <input type="password" name="password" id="form-password" class="form-control  @error('password') is-invalid @enderror">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="form-whatsapp">Whatsapp:</label>
                    <input type="text" name="whatsapp" id="form-whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" value="{{ old('whatsapp') }}">
                    @error('whatsapp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="form-role">Role:</label>
                    <select name="role" id="form-role" class="form-control @error('role') is-invalid @enderror">
                        <option hidden>------</option>
                        <option value="Officer">Officer</option>
                        <option value="Team Leader">Team Leader</option>
                        <option value="Manager">Manager</option>
                        <option value="Direktur">Direktur</option>
                    </select>
                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-secondary me-2">Reset</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
