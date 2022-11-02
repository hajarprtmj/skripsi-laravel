<?php

namespace App\Http\Controllers;

use App\Models\MejaModel;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\TransaksiModel;
use Carbon\Carbon;

class CartController extends Controller
{
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->middleware('auth');
    }
    public function cart()
    {
        return view('layout.cart');
    }

    public function addToCart($id_menu)
    {
        $product = MenuModel::findOrFail($id_menu);

        $cart = session()->get('cart', []);

        if (isset($cart[$id_menu])) {
            $cart[$id_menu]['quantity']++;
        } else {
            $cart[$id_menu] = [
                "nama_makanan" => $product->nama_makanan,
                "quantity" => 1,
                "harga" => $product->harga,
                "gambar" => $product->gambar
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('pesan', 'Menu telah masuk dikeranjang');
    }

    public function update(Request $request)
    {
        if ($request->id_menu && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id_menu]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('pesan', 'Menu berhasil diupdate');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id_menu) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id_menu])) {
                unset($cart[$request->id_menu]);
                session()->put('cart', $cart);
            }
            session()->flash('Pesan', 'Menu berhasil dihapus');
        }
    }

    public function deleteCart(Request $request){
        $request->session()->forget(['cart']);
        return redirect()->route('cart')
        ->with('pesan','Meja Berhasil dihapus');
    }

    public function transaksi(){
        $meja = MejaModel::all();
        $cart = session()->get('cart', []);
        return view('layout.transaksi', compact('meja'));
    }

    public function simpanTransaksi(Request $request)
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        $mydate = Carbon::now();

        $request->validate([
            'id' => 'required',
            'id_meja' => 'required',
            'tagihan' => 'required',
            'pesanan' => 'required',
        ]);

        $data = [
            'id' => Request()->id,
            'id_meja' => Request()->id_meja,
            'tanggal_transaksi' => $mydate,
            'tagihan' => Request()->tagihan,
            'pesanan' => Request()->pesanan,
        ];

        $this->TransaksiModel->addData($data);
        return redirect()->route('menu.index');
    }
}
