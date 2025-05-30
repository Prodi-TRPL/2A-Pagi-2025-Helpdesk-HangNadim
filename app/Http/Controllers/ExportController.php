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
            'pdf' => 'required'
        ]);

        $tanggal = $request->pdf;
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

        return $pdf->stream("Report_{$bulan}_{$tahun}.pdf");
    }

    public function generateExcel(Request $request)
    {
        $validated = $request->validate([
            'xlsx' => 'required'
        ]);

        $tanggal = $request->xlsx;
        [$tahun,$bulan] = explode('-', $tanggal);

        return Excel::download(new ExcelExport($bulan, $tahun), 'Komplain.xlsx');
    }
}