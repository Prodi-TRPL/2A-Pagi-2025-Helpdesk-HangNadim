<?php

namespace App\Exports;

use App\Models\Komplain;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

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
        return 'B4';
    }

    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            $sheet = $event->sheet->getDelegate();

            $sheet->mergeCells('B1:H1');
            $sheet->setCellValue('B1', 'Komplain bulan ' . $this->bulan . ' tahun ' . $this->tahun);
            $sheet->getStyle('B1')->getFont()->setName('Times New Roman')->setSize(20)->setBold(true);
            $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('B1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $sheet->mergeCells('B2:C2');
            $sheet->mergeCells('F2:H2');
            $sheet->setCellValue('B2', 'Dibuat oleh: ' . Auth::user()->name);
            $sheet->setCellValue('F2', 'Tanggal: ' . now()->format('d-m-Y'));
            $sheet->getStyle('B2:H2')->getFont()->setName('Times New Roman')->setSize(12)->setBold(true);
            $sheet->getStyle('B2:H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


            $sheet->getColumnDimension('B')->setWidth(15);
            $sheet->getColumnDimension('C')->setWidth(25);
            $sheet->getColumnDimension('D')->setWidth(25);
            $sheet->getColumnDimension('E')->setWidth(40);
            $sheet->getColumnDimension('F')->setWidth(25);
            $sheet->getColumnDimension('G')->setWidth(20);
            $sheet->getColumnDimension('H')->setWidth(20);

            foreach (range('B', 'H') as $col) {
                $range = $col . '4:' . $col . $sheet->getHighestRow();

                $sheet->getStyle($range)->getFont()
                      ->setName('Times New Roman');

                $sheet->getStyle($range)
                      ->getAlignment()->setWrapText(true)
                      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER)
                      ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
            }

            $sheet->getRowDimension(4)->setRowHeight(30); 
            foreach (range(5, $sheet->getHighestRow()) as $row) {
                $sheet->getRowDimension($row)->setRowHeight(25); 
            }

            $sheet->getStyle('B4:H4')->getFont()->setSize(14)->setBold(true);
            $sheet->getStyle('B4:H4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
            $sheet->getStyle('B4:H4')->getFill()->getStartColor()->setRGB('ADD8E6'); 

            $sheet->getStyle('B4:H' . $sheet->getHighestRow())
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
