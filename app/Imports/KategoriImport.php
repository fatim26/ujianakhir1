<?php

namespace App\Imports;

use App\Models\kategori;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KategoriImport implements  ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(\Illuminate\Support\Collection $collection)
    {
        foreach ($collection as $row){
            if(isset($row['name'])){
                kategori::create([
                    'name' => $row['name']
                ]);
            }
        }
        
        
    }

    // public function headingRow(): int
    // {
    //     return 1;
    // }
}