@extends('layout.admin')
<form action="{{ route('kelola_admin_store') }}" method="POST">
    @csrf
    <label id="label-nama" for="form-nama">Nama: </label>
    <input id="form-nama" type="text" name="name"></br>
    @error('nama') 'Erroor' @enderror
        
    <label id="label-email" for="form-email">email: </label>
    <input id="form-email" type="email" name="email"></br>
    <label id="label-password" for="form-password">password: </label>
    <input id="form-password" type="password" name="password"></br>
    <label id="label-whatsapp" for="form-whatsapp">whatsapp: </label>
    <input id="form-whatsapp" type="text" name="whatsapp"></br>
    <label id="label-role" for="form-role">role: </label>
    <select id="form-role" name="role">
        <option hidden>------</option>
        <option value="Officer">Officer</option>
        <option value="Team Leader">Team Leader</option>
        <option value="Manager">Manager</option>
        <option value="Direktur">Direktur</option>
    </select>
    <button type="submit">Tambah</button>
    <button type="reset">Reset</button>
</form>