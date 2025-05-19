<?php

namespace App\Exports;

use App\Models\Komplain;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;

class ExcelExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithCustomStartCell, WithEvents
{
    protected $bulan;
    protected $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        return Komplain::with('pelapor', 'kategori', 'penilaian')
            ->whereMonth('created_at', $this->bulan)
            ->whereYear('created_at', $this->tahun)
            ->get()
            ->sortByDesc(function ($item) {
                return $item->penilaian->rating ?? 0;
            });
    }

    public function map($komplain): array
    {
        return [
            $komplain->tiket,
            $komplain->pelapor->nama ?? '-',
            $komplain->pelapor->email ?? '-',
            $komplain->message ?? '-',
            $komplain->kategori->nama_kategori ?? '-',
            $komplain->created_at->format('Y-m-d') ?? '-',
            $komplain->penilaian->rating_text ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'Tiket',
            'Nama',
            'Email',
            'Komplain',
            'Kategori',
            'Tanggal',
            'Rating',
        ];
    }

    public function startCell(): string
    {
        return 'B3';
    }

    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            $sheet = $event->sheet->getDelegate();

            $sheet->mergeCells('B1:H1');
            $sheet->setCellValue('B1', 'Komplain bulan ' . $this->bulan . ' tahun ' . $this->tahun);
            $sheet->getStyle('B1')->getFont()->setSize(16)->setBold(true);
            $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('B1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $sheet->getColumnDimension('B')->setWidth(15);
            $sheet->getColumnDimension('C')->setWidth(25);
            $sheet->getColumnDimension('D')->setWidth(25);
            $sheet->getColumnDimension('E')->setWidth(40);
            $sheet->getColumnDimension('F')->setWidth(25);
            $sheet->getColumnDimension('G')->setWidth(20);
            $sheet->getColumnDimension('H')->setWidth(20);

            foreach (range('B', 'H') as $col) {
                $sheet->getStyle($col . '3:' . $col . $sheet->getHighestRow())
                      ->getAlignment()->setWrapText(true)
                      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                      ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            }

            $sheet->getRowDimension(3)->setRowHeight(30); 
            foreach (range(4, $sheet->getHighestRow()) as $row) {
                $sheet->getRowDimension($row)->setRowHeight(25); 
            }

            $sheet->getStyle('B3:H3')->getFont()->setSize(14)->setBold(true);
            $sheet->getStyle('B3:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
            $sheet->getStyle('B3:H3')->getFill()->getStartColor()->setRGB('ADD8E6'); 

            $sheet->getStyle('B3:H' . $sheet->getHighestRow())
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
