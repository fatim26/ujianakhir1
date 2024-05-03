<?php

namespace App\Http\Controllers;

use App\Exports\KategoriExport;
use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use App\Exports\Kategorixport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\KategoriImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] =  Kategori::orderBy('created_at','ASC')->get();

        //menampilkan data
        return view('kategori.index')->with($data);
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
    public function store(StoreKategoriRequest $request)
    { 
        // dd ($request->());
        try{
            DB::beginTransaction();
            Kategori::create($request->all());
            DB::commit();
            return redirect('Kategori')->with('success','Data berasil ditambahkan');
        }catch (QueryException | Exception | PDOException) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $Kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $Kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $kategori->update($request->all());
        return redirect('Kategori')->with('success',' Update Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect('/Kategori')->with('success','Data berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return excel::download(new KategoriExport, $date . '_Kategori.xlsx');
    }

    public function importData(Request $request){
        
        // $validator = FacadesValidator::make($request->all(), [
        //     'import' => 'required'
        // ]);
    
        // $validated = $validator->validated();
    
        Excel::import(new KategoriImport, $request->import);
    
        return redirect()->back()->with('success', 'Data berhasil diimport');
    
    }

    public function Kategoripdf()
    {
        $kategori = Kategori::all();
        $pdf = pdf::loadView('kategori.data', compact('kategori'));
        return $pdf-> download('kategori.pdf');
    }
}