<?php

namespace App\Http\Controllers;

use App\Exports\MejaExport;
use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDOException;
use App\Exports\Mejaxport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\MejaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['Meja'] =  Meja::orderBy('created_at','ASC')->get();

        //menampilkan data
        return view('Meja.index')->with($data);
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
    public function store(StoreMejaRequest $request)
    { 
        // dd ($request->());
        try{
            DB::beginTransaction();
            Meja::create($request->all());
            DB::commit();
            return redirect('Meja')->with('success','Data berasil ditambahkan');
        }catch (QueryException | Exception | PDOException) {
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $Meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $Meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $Meja)
    {
        $Meja->update($request->all());
        return redirect('Meja')->with('success',' Update Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $Meja)
    {
        $Meja->delete();
        return redirect('/Meja')->with('success','Data berhasil dihapus!');
    }

    public function exportData(){
        $date = date('Y-m-d');
        return excel::download(new MejaExport, $date . '_Meja.xlsx');
    }

    public function importData(Request $request){
        
        // $validator = FacadesValidator::make($request->all(), [
        //     'import' => 'required'
        // ]);
    
        // $validated = $validator->validated();
    
        Excel::import(new MejaImport, $request->import);
    
        return redirect()->back()->with('success', 'Data berhasil diimport');
    
    }

    public function Mejapdf()
    {
        $Meja = Meja::all();
        $pdf = pdf::loadView('Meja.data', compact('Meja'));
        return $pdf-> download('Meja.pdf');
    }
}