<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailtransaksi extends Model
{
    use HasFactory;
    protected $table = 'detailtransaksis';
    protected $guarded = ['id'];

    public function Transaksi(){
        return $this -> belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function menu(){
        return $this->hasOne(Menu::class, 'id','menu_id');
    }
}
