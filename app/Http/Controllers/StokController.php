<?php

namespace App\Http\Controllers;

use App\Exports\StokExport;
use App\Models\Stok;
use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use App\Exports\Stokxport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\StokImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['stok'] =  Stok::orderBy('created_at','ASC')->get();

        //menampilkan data
        return view('stok.index')->with($data);
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
    public function store(StoreStokRequest $request)
    {
       
        try{
            DB::beginTransaction();
            Stok::create($request->all());
            DB::commit();
            return redirect('Stok')->with('success','Data berasil ditambahkan');
        }catch (QueryException | Exception | PDOException) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $Stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $Stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestokRequest $request, stok $stok)
    {
        $stok->update($request->all());
        return redirect('stok')->with('success',' Update Data berhasil!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stok $stok)
    {
        $stok->delete();
        return redirect('/stok')->with('success','Data berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return excel::download(new StokExport, $date . '_Stok.xlsx');
    }

    public function importData(Request $request){
        
        // $validator = FacadesValidator::make($request->all(), [
        //     'import' => 'required'
        // ]);
    
        // $validated = $validator->validated();
    
        Excel::import(new StokImport, $request->import);
    
        return redirect()->back()->with('success', 'Data berhasil diimport');
    
    }


    public function Stokpdf()
    {
        $Stok = Stok::all();
        $pdf = pdf::loadView('Stok.data', compact('Stok'));
        return $pdf-> download('Stok.pdf');
    }
}