<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Komplain Baru</title>
</head>
<body>

<h2>Komplain Baru Diajukan</h2>

<p><strong>Nomor Tiket:</strong> {{ $komplain->tiket }}</p>
<p><strong>Tanggal:</strong> {{ $komplain->created_at->format('d-m-Y H:i') }}</p>
<p><strong>Nama Pelapor:</strong> {{ $pelapor->nama }}</p>
<p><strong>Isi Komplain:</strong><br>{{ $komplain->message }}</p>
{{-- <p><strong>Status Awal:</strong> {{ $komplain->status }}</p> --}}

<p>Silakan cek dashboard untuk menindaklanjuti komplain ini.</p>

    
</body>
</html>