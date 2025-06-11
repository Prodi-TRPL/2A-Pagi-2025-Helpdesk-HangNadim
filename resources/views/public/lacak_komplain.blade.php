@extends('layout.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 70vh;">
    <h1 class="mb-4">Pelacakan Status Aduan</h1>
    <input type="text" class="form-control rounded-pill w-50" placeholder="Masukkan no tiket">
    <img src="{{ asset('search.svg') }}" alt="App Preview" class="img-fluid rounded shadow my-5">

</div>
@endsection
