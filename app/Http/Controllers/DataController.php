<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use App\Models\Detailtransaksi;
use Carbon\Carbon;

class DataController extends Controller
{
    public function index(){
        $menu = menu::get();

        $data['count_menu'] = $menu->count();


        $detailTransaksi = DetailTransaksi::get();
        $totalPendapatan = $detailTransaksi->groupBy(function ($date){
            $date = Carbon::parse($date->tanggal)->format('m/d');
        })->map(function ($groupedItems){
            return $groupedItems->sum('subtotal');
        });

        
        // tampilkan 10 data pelanggan trakhir
        $data['Pelanggan'] = pelanggan::Limit(10)->orderBy('created_at','desc')->get();

        //tampilkan 5 transaksi trakhir

        //tampilkan semua pendapatan
        // $transaksi = Transaksi::get();
        // $data['pendapatan'] = $transaksi->sum('total_harga');


        return view('data')->with($data);
    }
}
