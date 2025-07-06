<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Komplain;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

class ExcelExport implements FromCollection, WithMapping, WithHeadings, WithCustomStartCell, WithEvents
{
    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function collection()
    {
        $data = Komplain::with('pelapor', 'kategori', 'penilaian')
            ->whereBetween('created_at', [$this->start, $this->end])
            ->get()
            ->sortByDesc(function ($item) {
                return $item->penilaian->rating ?? 0;
            });

        return $data;
    }

    public function map($komplain): array
    {
        return [
            $komplain->tiket,
            $komplain->pelapor->nama ?? '-',
            $komplain->message ?? '-',
            $komplain->kategori->nama_kategori ?? '-',
            $komplain->created_at->translatedformat('d F Y') ?? '-',
            $komplain->penilaian->rating_text ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'Tiket',
            'Nama',
            'Komplain',
            'Kategori',
            'Tanggal',
            'Rating',
        ];
    }

    public function startCell(): string
    {
        return 'B4';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $startFormatted = Carbon::parse($this->start)->translatedFormat('d F Y');
                $endFormatted = Carbon::parse($this->end)->translatedFormat('d F Y');

                $sheet->mergeCells('B1:G1');
                $sheet->setCellValue('B1', 'Komplain Tanggal ' . $startFormatted . ' Sampai ' . $endFormatted);
                $sheet->getStyle('B1')->getFont()->setName('Times New Roman')->setSize(20)->setBold(true);
                $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('B1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $sheet->mergeCells('B2:C2');
                $sheet->mergeCells('F2:G2');
                $sheet->setCellValue('B2', 'Dibuat oleh: ' . Auth::user()->name);
                $sheet->setCellValue('F2', 'Tanggal: ' . now()->translatedformat('d F Y'));
                $sheet->getStyle('B2:G2')->getFont()->setName('Times New Roman')->setSize(12)->setBold(true);
                $sheet->getStyle('B2:G2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $sheet->getColumnDimension('B')->setWidth(20);  
                $sheet->getColumnDimension('C')->setWidth(20);  
                $sheet->getColumnDimension('D')->setWidth(60);
                $sheet->getColumnDimension('E')->setWidth(25);
                $sheet->getColumnDimension('F')->setWidth(12);
                $sheet->getColumnDimension('G')->setWidth(15);

                foreach (range('B', 'G') as $col) {
                    $range = $col . '4:' . $col . $sheet->getHighestRow();

                    $sheet->getStyle($range)->getFont()
                          ->setName('Times New Roman')
                          ->setSize(10);

                    $sheet->getStyle($range)
                          ->getAlignment()->setWrapText(true)
                          ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                          ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
                }

                $sheet->getRowDimension(4)->setRowHeight(40);

                foreach (range(5, $sheet->getHighestRow()) as $row) {
                    $komplainText = $sheet->getCell('D' . $row)->getCalculatedValue();
                    $lineD = ceil(strlen($komplainText) / 50);
                    $rowHeight = max(30, $lineD * 20);
                    $sheet->getRowDimension($row)->setRowHeight($rowHeight);
                }

                $sheet->getStyle('B4:G4')->getFont()->setSize(12)->setBold(true);
                $sheet->getStyle('B4:G4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle('B4:G4')->getFill()->getStartColor()->setRGB('ADD8E6'); 

                $sheet->getStyle('B4:G' . $sheet->getHighestRow())
                      ->applyFromArray([
                          'borders' => [
                              'allBorders' => [
                                  'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                              ],
                          ],
                      ]);
            },
        ];
    }
}
