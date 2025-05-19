<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    {{-- Navbar --}}
    @include('partials.navbar_admin')

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- buat @section('content') di file yang @extends('layout.admin')  --}}
        @yield('content')


    {{-- Bootstrap JS --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>