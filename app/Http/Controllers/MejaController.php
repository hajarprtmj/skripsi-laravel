<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MejaModel;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meja = MejaModel::all();
        return view('layout.meja', compact('meja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.mejaCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_meja' => 'required',
        ]);

        MejaModel::create($request->all());
        return redirect()->route('meja.index')
        ->with('pesan','Meja Berhasil ditambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MejaModel $meja)
    {
        return view('layout.mejaEdit', compact('meja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MejaModel $meja)
    {
        $request->validate([
            'no_meja' => 'required',
        ]);

        $meja->update($request->all());
        return redirect()->route('meja.index')
        ->with('pesan','Meja Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MejaModel $meja)
    {
        $meja->delete();
        return redirect()->route('meja.index')
        ->with('pesan','Meja Berhasil dihapus');;
    }
}
