@extends('layout.admin')
<form action="{{ route('kelola.admin.store') }}" method="POST">
    @csrf
    <label id="label-nama" for="form-nama">Nama: </label>
    <input id="form-nama" type="text" name="name"></br>
    @error('name') <div>{{ $message }}</div> @enderror

    <label id="label-email" for="form-email">email: </label>
    <input id="form-email" type="email" name="email"></br>
    @error('email') <div>{{ $message }}</div> @enderror

    <label id="label-password" for="form-password">password: </label>
    <input id="form-password" type="password" name="password"></br>
    @error('password') <div>{{ $message }}</div> @enderror

    <label id="label-whatsapp" for="form-whatsapp">whatsapp: </label>
    <input id="form-whatsapp" type="text" name="whatsapp" value="{{ old('whatsapp')}}"></br>
    @error('whatsapp') <div>{{ $message }}</div> @enderror

    <label id="label-role" for="form-role">role: </label>
    <select id="form-role" name="role">
        <option hidden>------</option>
        <option value="Officer">Officer</option>
        <option value="Team Leader">Team Leader</option>
        <option value="Manager">Manager</option>
        <option value="Direktur">Direktur</option>
    </select>
    @error('role') <div>{{ $message }}</div> @enderror
    <button type="submit">Tambah</button>
    <button type="reset">Reset</button>
</form>