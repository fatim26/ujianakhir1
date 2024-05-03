<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;
class AbsensiExport implements FromCollection, WithHeadings, WithEvents

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absensi::get();
    }

    public function headings(): array
    {
        return[
            'No',
            'nama_karyawan', 
            'tanggal_masuk',
            'waktu_masuk', 
            'status',
            'waktu_keluar',

        ];
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class => function(AfterSheet $Event){
                $Event->sheet->getColumnDimension('A')->setAutoSize(true);
                $Event->sheet->getColumnDimension('B')->setAutoSize(true);
                $Event->sheet->getColumnDimension('C')->setAutoSize(true);
                $Event->sheet->getColumnDimension('D')->setAutoSize(true);
                $Event->sheet->getColumnDimension('E')->setAutoSize(true);
                $Event->sheet->getColumnDimension('F')->setAutoSize(true);
                
                
                $Event->sheet->insertNewRowBefore(1,2);
                $Event->sheet->mergeCells('A1:E1');
                $Event->sheet->setCellValue('A1','Data Menu');
                $Event->sheet->getStyle('A1')->getFont()->setBold(true);
                $Event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $Event->sheet->getStyle('A3:F'.$Event->sheet->getHighestRow())->applyFromArray([
                    'borders'=>[
                        'allBorders'=>[
                            'borderStyle' =>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' =>['argb'=>'000000']
                        ]
                    ]
                ]);
            }
        ];
    }  

}
