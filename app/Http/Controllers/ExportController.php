<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Komplain;
use App\Exports\ExcelExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function generatePdf(Request $request)
    {
        $validated = $request->validate([
            'tanggalpdf' => 'required'
        ]);

        $tanggal = $request->tanggalpdf;
        [$tahun,$bulan] = explode('-', $tanggal);

        $data = Komplain::with('pelapor', 'kategori', 'penilaian')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->get()
            ->sortByDesc(function ($item) {
                return $item->penilaian->rating ?? 0;
            });

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('export.pdf', compact('data', 'bulan', 'tahun'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream("report_{$bulan}_{$tahun}.pdf");
    }

    public function generateExcel(Request $request)
    {
        $validated = $request->validate([
            'tanggalxlsx' => 'required'
        ]);

        $tanggal = $request->tanggalxlsx;
        [$tahun,$bulan] = explode('-', $tanggal);

        return Excel::download(new ExcelExport($bulan, $tahun), 'komplain.xlsx');
    }
}