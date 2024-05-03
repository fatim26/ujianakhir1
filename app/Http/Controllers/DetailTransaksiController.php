<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Http\Requests\StoreDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use PDOException;
use Illuminate\Support\Facades\DB;


class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['detailtransaksi'] = Detailtransaksi::orderBy('created_at','ASC')->get();

        //menampilkan data
        return view('detailtransaksi.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetailTransaksiRequest $request)
    {
        try{
            DB::beginTransaction();
            DetailTransaksi::create($request->all());
            DB::commit();
            return redirect('detailTransaksi')->with('success','Data berasil ditambahkan');
        }catch (QueryException | Exception | PDOException) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailTransaksiRequest $request, DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->update($request->all());
        return redirect('detailTransaksi')->with('success',' Update Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        $detailTransaksi->delete();
        return redirect('/detailtransaksi')->with('success','Data berhasil dihapus!');
    }
}