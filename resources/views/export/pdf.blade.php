<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Komplain</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            word-wrap: break-word;
        }
        th {
            background-color: #f2f2f2;
        }
        .col-tiket {width: 15%;}
        .col-nama {width: 14%;}
        .col-komplain {width: 27%;}
        .col-kategori {width: 12%;}
        .col-tanggal {width: 10%;}
        .col-rating {width: 12%;}
    </style>
</head>
<body>
    <p>Laporan Dibuat oleh: {{ Auth::user()->name }}</p>
    <p>Tanggal: {{ now()->format('d-m-Y')}}</p>

    <h2>Laporan Komplain Tanggal {{ $start }} Sampai {{ $end }}</h2>
    @if ($data->isEmpty())
        <h1 style="text-align: center;">Tidak ada data untuk periode ini.</h1>
    @else
    <table>
        <thead>
            <tr>
                <th class="col-tiket">Tiket</th>
                <th class="col-nama">Nama</th>
                <th class="col-komplain">Komplain</th>
                <th class="col-kategori">Kategori</th>
                <th class="col-tanggal">Tanggal</th>
                <th class="col-rating">Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td class="col-tiket">{{ $item->tiket }}</td>
                <td class="col-nama">{{ $item->pelapor->nama ?? '-' }}</td>
                <td class="col-komplain">{{ Str::limit($item->message, 150, '...') }}</td>
                <td class="col-kategori">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                <td class="col-tanggal">{{ $item->created_at->format('d-m-Y') }}</td>
                <td class="col-rating">{{ $item->penilaian->rating_text ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>