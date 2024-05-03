<?php

namespace App\Http\Controllers;

use App\Models\Contak;
use App\Http\Requests\StoreContakRequest;
use App\Http\Requests\UpdateContakRequest;

class ContakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['contak'] =  contak::orderBy('created_at','ASC')->get();

        //menampilkan data
        return view('contak.index');
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
    public function store(StoreContakRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contak $contak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contak $contak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContakRequest $request, Contak $contak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contak $contak)
    {
        //
    }
}
