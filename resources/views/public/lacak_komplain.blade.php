@extends('layout.app')
@section('content')

<div class="container mt-5 mb-5 flex-grow-1 py-5 d-flex flex-column justify-content-center align-items-center">
    <div class="text-center mb-4">
        <h1 class="display-4 fw-bold text-primary mb-3 mt-3">{{ __('messages.home') }}Pelacakan Status Aduan</h1>
        <p class="lead text-muted">{{ __('messages.home') }}Masukkan nomor tiket Anda untuk melacak status pengaduan</p>
    </div>
    
    <div class="mb-4 w-100 row">
        <form action="{{ route('lacak.komplain.submit') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control rounded-start-pill" placeholder="{{ __('messages.home') }}Masukkan no tiket" name="tiket">
                <button class="btn btn-primary rounded-end-pill px-4" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    
    <div class="mt-4 mb-4">
        <img src="{{ asset('img/search.svg') }}" alt="Search Preview" class="img-fluid rounded d-none d-md-block" style="max-width: 350px; width: 100%;">
        <img src="{{ asset('img/search.svg') }}" alt="Search Preview" class="img-fluid rounded d-block d-md-none" style="max-width: 250px; width: 100%;">
    </div>
    
    <div class="text-center text-muted">
        @if (session('error'))
        <small class="text-danger">
            {{session('error')}}
        </small>
        @else
        <small>{{ __('messages.home') }}Masukkan nomor tiket yang Anda terima saat mengajukan aduan😉</small>
        @endif
    </div>
</div>
@endsection