<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            'start' => 'required',
            'end' => 'required'
        ]);

        $start = Carbon::createFromFormat('Y-m', $validated['start'])->startOfMonth()->toDateString();
        $end = Carbon::createFromFormat('Y-m', $validated['end'])->endOfMonth()->toDateString();  

        if ($validated['start'] > $validated['end']) {
            return back()->withErrors(['start' => 'Tanggal awal tidak boleh lebih besar dari tanggal akhir.']);
        }

        $data = Komplain::with('pelapor', 'kategori', 'penilaian')
            ->whereBetween('created_at', [$start, $end])
            ->get()
            ->sortByDesc(function ($item) {
                return $item->penilaian->rating ?? 0;
            });

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('export.pdf', compact('data', 'start', 'end'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream("Report_{$start}_Sampai_{$end}.pdf");
    }

    public function generateExcel(Request $request)
    {
        $validated = $request->validate([
            'start' => 'required',
            'end' => 'required'
        ]);

       $start = Carbon::createFromFormat('Y-m', $validated['start'])->startOfMonth()->toDateString();
       $end = Carbon::createFromFormat('Y-m', $validated['end'])->endOfMonth()->toDateString(); 
       
       if ($validated['start'] > $validated['end']) {
            return back()->withErrors(['start' => 'Tanggal awal tidak boleh lebih besar dari tanggal akhir.']);
        }

        return Excel::download(new ExcelExport($start, $end), 'Komplain.xlsx');
    }
}