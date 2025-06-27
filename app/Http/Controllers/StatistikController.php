<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use App\Models\Kategori;
use App\Models\Komplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {

        $totalKomplain = Komplain::whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();

        $totalSaran = Saran::whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();

        return view('admin.statistik', compact(['totalKomplain', 'totalSaran']));
    }

    public function getStatistikBar(Request $request)
    {
        $tahun = $request->get('tahun', now()->year);
        
        $results = Komplain::selectRaw('
            MONTH(created_at) as bulan,
            status,
            COUNT(*) as total
        ')
        ->whereYear('created_at', $tahun)
        ->groupBy('bulan', 'status')
        ->get();
        
        $data = [
            'Menunggu' => array_fill(0, 12, 0),
            'Diproses' => array_fill(0, 12, 0),
            'Selesai' => array_fill(0, 12, 0),
        ];
        
        foreach ($results as $result) {
            $bulanIndex = $result->bulan - 1;
            if (isset($data[$result->status])) {
                $data[$result->status][$bulanIndex] = $result->total;
            }
        }
        
        return response()->json($data);
    }

    public function getStatistikPie(Request $request)
    {
        $tahun = $request->get('tahun', now()->year);
        $bulan = $request->get('bulan', now()->month);
        
        $labels = ['Rendah', 'Sedang', 'Tinggi'];
        $data = Komplain::whereYear('created_at', $tahun)
        ->whereMonth('created_at', $bulan)
        ->selectRaw('tingkat, COUNT(*) as total')
        ->groupBy('tingkat')
        ->orderByRaw("FIELD(tingkat, 'Rendah', 'Sedang', 'Tinggi')")
        ->pluck('total', 'tingkat');

        return response()->json([
            'labels' => $labels,
            'values' => collect($labels)->map(fn($t) => $data->get($t, 0))
        ]);
    }

    public function getStatistikColumn(Request $request)
    {
        $tahun = $request->get('tahun', now()->year);
        $bulan = $request->get('bulan', now()->month);

        $labels = Kategori::pluck('nama_kategori')->toArray();

        $data = DB::table('komplains')
        ->join('kategori', 'komplains.kategori_id', '=', 'kategori.id')
        ->whereYear('komplains.created_at', $tahun)
        ->whereMonth('komplains.created_at', $bulan)
        ->select('kategori.nama_kategori as kategori', DB::raw('COUNT(*) as total'))
        ->groupBy('kategori.nama_kategori')
        ->pluck('total', 'kategori');

        $values = collect($labels)->map(fn($nama) => $data->get($nama, 0));

        return response()->json([
        'labels' => $labels,
        'values' => $values
        ]);
    }
}
