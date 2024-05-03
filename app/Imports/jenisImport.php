<?php

namespace App\Imports;

use App\Models\jenis;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class jenisImport implements  ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(\Illuminate\Support\Collection $collection)
    {
        foreach ($collection as $row){
            if(isset($row['nama_jenis'])){
                jenis::create([
                    'nama_jenis' => $row['nama_jenis'],
                    'kategori_id' => $row['kategori_id'],
                    
                ]);
            }
        }
        
        
    }

    // public function headingRow(): int
    // {
    //     return 1;
    // }
}