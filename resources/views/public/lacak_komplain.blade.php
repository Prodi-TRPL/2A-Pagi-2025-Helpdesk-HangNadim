@extends('layout.app')
    @section('content')
    @if($komplain)
    Tiket: {{$komplain->tiket}} <br>
    Komplain: {{$komplain->message}} <br>
    Nama: {{$komplain->pelapor->nama}} <br>
    Kategori: {{$komplain->kategori->nama_kategori}} <br>
    Status: {{$komplain->status}} <br>
    <a href="{{route('home')}}" class="btn btn-primary">Kembali</a>
    @elseif($error)
    {{$error}} <br>
    <a href="{{route('lacak.komplain')}}" class="btn btn-primary">Kembali</a>
    @endif

    @endsection
