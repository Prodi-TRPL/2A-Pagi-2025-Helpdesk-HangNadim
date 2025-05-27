<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('hover.css') }}">

</head>
<body>
    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- buat @section('content') @endsection di file yang @extends('layout.app')  --}}
        @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Bootstrap JS --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>