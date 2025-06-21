<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use App\Models\Komplain;
use Illuminate\Http\Request;

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

    public function getStatistik(Request $request)
    {
        $tahun = $request->get('year', now()->year);
        
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
}
