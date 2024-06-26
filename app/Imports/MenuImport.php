<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements  ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(\Illuminate\Support\Collection $collection)
    {
        foreach ($collection as $row){
            if(isset($row['nama_menu'])){
                menu::create([
                    'nama_menu' => $row['nama_menu'],
                    'harga' => $row['harga'],
                    'image' => $row['image'],
                    'deskripsi' => $row['deskripsi'],
                    'jenis_id' => $row['jenis_id'],
                ]);
            }
        }
        
        
    }

    // public function headingRow(): int
    // {
    //     return 1;
    // }
}