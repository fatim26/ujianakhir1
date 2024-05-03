<?php

namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MejaImport implements  ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(\Illuminate\Support\Collection $collection)
    {
        foreach ($collection as $row){
            if(isset($row['nomor_meja'])){
                Meja::create([
                    'nomor_meja' => $row['nomor_meja'],
                    'kapasitas' => $row['kapasitas'],
                    'status' => $row['status'],

                ]);
            }
        }
        
        
    }

    // public function headingRow(): int
    // {
    //     return 1;
    // }
}