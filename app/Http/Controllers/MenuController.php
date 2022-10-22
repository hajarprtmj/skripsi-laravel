<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuModel;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->MenuModel = new MenuModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = MenuModel::all();
        return view('layout.menu', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.menuCreate');
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
            'nama_makanan' => 'required',
            'jenis_makanan' => 'required',
            'gambar' => 'required|image|mimes:png,jpg',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        // MenuModel::create($request->all());
        // upload file
        $file = Request()->gambar;
        $fileName = Request()->id_menu.'.'.$file->extension();
        $file->move(public_path('picture'),$fileName);

        $data = [
            'nama_makanan' => Request()->nama_makanan,
            'jenis_makanan' => Request()->jenis_makanan,
            'gambar' => $fileName,
            'harga' => Request()->harga,
            'keterangan' => Request()->keterangan,
        ];
        $this->MenuModel->addData($data);
        return redirect()->route('menu.index');
                        // ->with('success','Menu Berhasil ditambahkan');
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
    public function edit(MenuModel $menu)
    {
        return view('layout.menuEdit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MenuModel $menu)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'jenis_makanan' => 'required',
            'gambar' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);

        $menu->update($request->all());

        return redirect()->route('menu.index');
                        // ->with('success','Menu Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuModel $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');
                        // ->with('success','Menu Berhasil ditambahkan');
    }
}
