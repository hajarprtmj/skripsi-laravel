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
        // $prod_id = $request->input('product_id');
        // $quantity = $request->input('quantity');

        // if (Cookie::get('cart')) {
        //     $cookie_data = stripslashes(Cookie::get('cart'));
        //     $cart_data = json_decode($cookie_data, true);

        //     $item_id_list = array_column($cart_data, 'item_id');
        //     $prod_id_is_there = $prod_id;

        //     if (in_array($prod_id_is_there, $item_id_list)) {
        //         foreach ($cart_data as $keys => $values) {
        //             if ($cart_data[$keys]["item_id"] == $prod_id) {
        //                 $cart_data[$keys]["item_quantity"] =  $quantity;
        //                 $item_data = json_encode($cart_data);
        //                 $minutes = 60;
        //                 Cookie::queue(Cookie::make('cart', $item_data, $minutes));
        //                 return response()->json(['status' => '"' . $cart_data[$keys]["nama_makanan"] . '" Quantity Updated']);
        //             }
        //         }
        //     }
        // }

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

    public function transaksiTunai(){
        $meja = MejaModel::all();
        $cart = session()->get('cart', []);
        return view('layout.transaksiTunai', compact('meja'));
    }

    public function SimpantransaksiTunai(Request $request){
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        $mydate = Carbon::now();

        $request->validate([
            'id' => 'required',
            'id_meja' => 'required',
            'tagihan' => 'required',
            'pesanan' => 'required',
            'kategori_pembayaran' => 'required',
        ]);

        $data = [
            'id' => Request()->id,
            'id_meja' => Request()->id_meja,
            'tanggal_transaksi' => $mydate,
            'tagihan' => Request()->tagihan,
            'pesanan' => Request()->pesanan,
            'kategori_pembayaran' => Request()->kategori_pembayaran,
        ];

        $request->session()->forget(['cart']);
        $this->TransaksiModel->addData($data);
        return redirect()->route('pembayaranTunai');
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
            'foto_pembayaran' => 'required|image|mimes:png,jpg',
            'kategori_pembayaran' => 'required',
        ]);

        // upload file
        $file = Request()->foto_pembayaran;
        $fileName = Request()->id.time().'.' . $file->extension();
        $file->move(public_path('foto_transaksi'), $fileName);

        $data = [
            'id' => Request()->id,
            'id_meja' => Request()->id_meja,
            'tanggal_transaksi' => $mydate,
            'tagihan' => Request()->tagihan,
            'pesanan' => Request()->pesanan,
            'foto_pembayaran' => $fileName,
            'kategori_pembayaran' => Request()->kategori_pembayaran,
        ];

        $request->session()->forget(['cart']);
        $this->TransaksiModel->addData($data);
        return redirect()->route('pembayaran');
    }

    public function pembayaran(TransaksiModel $transaksi){
        return view('layout.pembayaran', compact('transaksi'));
    }

    public function pembayaranTunai(TransaksiModel $transaksi){
        return view('layout.pembayaranTunai', compact('transaksi'));
    }
}
