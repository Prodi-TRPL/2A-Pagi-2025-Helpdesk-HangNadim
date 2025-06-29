<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Komplain</title>
</head>
<body>
    
    <h2>Halo {{ $pelapor->nama }}</h2>

    <p><strong>Nomor Tiket Anda:</strong> {{ $komplain->tiket }}</p>
    <p><strong>Tanggal:</strong> {{ $komplain->created_at->format('d-m-Y H:i') }}</p>
    <p><strong>Status Komplain:</strong> {{ $komplain->status }}</p>

    <p>Silakan cek di halaman lacak komplain untuk melihat detail komplain anda.</p>

</body>
</html>