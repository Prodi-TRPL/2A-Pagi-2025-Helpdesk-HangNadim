<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index(Request $request)
    {
        $list_tahun = range(date('Y'), 2020);
        $tahun_terpilih = $request->input('tahun', date('Y')); // pakai tahun dari input, default tahun sekarang

        return view('admin.statistik', compact('list_tahun', 'tahun_terpilih'));
    }
}
