<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['q'] = $request->query('q');
        $data['status_pembayaran'] = $request->query('status_pembayaran');
        $data['kategori_pembayaran'] = $request->query('kategori_pembayaran');
        $data['start'] = $request->query('start');
        $data['end'] = $request->query('end');
        $data['users'] = User::all();

        $query = TransaksiModel::select('transaksi.*', 'users.*', 'meja.*')
            ->join('users', 'users.id', '=', 'transaksi.id')
            ->join('meja', 'meja.id_meja', '=', 'transaksi.id')
            ->where(function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['q'] . '%');
                $query->orWhere('status_pembayaran', 'like', '%' . $data['q'] . '%');
                $query->orWhere('kategori_pembayaran', 'like', '%' . $data['q'] . '%');
            });

        if ($data['start'])
            $query->whereDate('tanggal_transaksi', '>=', $data['start']);
        if ($data['end'])
            $query->whereDate('tanggal_transaksi', '<=', $data['end']);
        if ($data['status_pembayaran'])
            $query->where('status_pembayaran', '=', $data['status_pembayaran']);
        if ($data['kategori_pembayaran'])
            $query->where('kategori_pembayaran', '=', $data['kategori_pembayaran']);

        $data['transaksi'] = $query->orderby('tanggal_transaksi','desc')->paginate(15)->withQueryString();
        // $transaksi = [
        //     'transaksi' => $this->TransaksiModel->allData(),
        // ];
        return view('layout-admin.transaksi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_transaksi)
    {
        $data = [
            'transaksi' => $this->TransaksiModel->detailData($id_transaksi),
        ];
        return view('layout-admin.transaksiShow', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_transaksi)
    {
        Request()->validate([
            'status_pembayaran' => 'required',
        ]);

        $data = [
            'status_pembayaran' => Request()->status_pembayaran,
        ];

        $this->TransaksiModel->editData($id_transaksi, $data);
        return redirect()->route('admin-transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
