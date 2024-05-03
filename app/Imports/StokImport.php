<?php

namespace App\Imports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements  ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(\Illuminate\Support\Collection $collection)
    {
        foreach ($collection as $row){
            if(isset($row['menu_id'])){
                Stok::create([
                    'menu_id' => $row['menu_id'],
                    'jumlah' => $row['jumlah'],
                    
                ]);
            }
        }
        
        
    }

    // public function headingRow(): int
    // {
    //     return 1;
    // }
}