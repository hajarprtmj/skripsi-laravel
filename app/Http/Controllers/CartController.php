<?php

namespace App\Http\Controllers;

use App\Models\MejaModel;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\TransaksiModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

    public function deleteCart(Request $request)
    {
        $request->session()->forget(['cart']);
        return redirect()->route('cart')
            ->with('pesan', 'Menu Berhasil dihapus');
    }

    public function transaksiTunai()
    {
        $meja = MejaModel::all();
        $cart = session()->get('cart', []);
        return view('layout.transaksiTunai', compact('meja'));
    }

    public function SimpantransaksiTunai(Request $request)
    {
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

    public function transaksi()
    {
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
            // 'foto_pembayaran' => 'required|image|mimes:png,jpg',
            'kategori_pembayaran' => 'required',
        ]);

        // upload file
        // $file = Request()->foto_pembayaran;
        // $fileName = Request()->id . time() . '.' . $file->extension();
        // $file->move(public_path('foto_transaksi'), $fileName);

        $data = [
            'id' => Request()->id,
            'id_meja' => Request()->id_meja,
            'tanggal_transaksi' => $mydate,
            'tagihan' => Request()->tagihan,
            'pesanan' => Request()->pesanan,
            // 'foto_pembayaran' => $fileName,
            'kategori_pembayaran' => Request()->kategori_pembayaran,
        ];

        $request->session()->forget(['cart']);
        $this->TransaksiModel->addData($data);
        return redirect()->route('pembayaran');
    }

    public function pembayaran(TransaksiModel $transaksi)
    {
        return view('layout.pembayaran', compact('transaksi'));
    }

    public function pembayaranTunai(TransaksiModel $transaksi)
    {
        return view('layout.pembayaranTunai', compact('transaksi'));
    }

    // Payment Gateway

    public function payment(Request $request)
    {
        // session
        $cart = session()->get('cart', []);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-GMJlDx7Rz_ez0loB0PvhYOg5';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->get('tagihan'),
            ),
            'customer_details' => array(
                'first_name' => '',
                'last_name' => '',
                'email' => Auth::user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('layouts.payment', ['snap_token' => $snapToken]);
    }

    public function payment_post(Request $request)
    {
        // add data
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        $mydate = Carbon::now();

        // payment gate way
        $json = json_decode($request->get('json'));
        $transaksi = new TransaksiModel();
        $transaksi->status = $json->transaction_status;
        $transaksi->id = $request->get('id');
        $transaksi->id_meja = $request->get('id_meja');
        $transaksi->tanggal_transaksi = $mydate;
        $transaksi->pesanan = $request->get('pesanan');
        $transaksi->tagihan = $request->get('tagihan');
        $transaksi->kategori_pembayaran = $request->get('kategori_pembayaran');
        $transaksi->email = Auth::user()->email;
        $transaksi->transaction_id = $json->transaction_id;
        $transaksi->order_id = $json->order_id;
        $transaksi->gross_amount = $json->gross_amount;
        $transaksi->payment_type = $json->payment_type;
        $transaksi->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $transaksi->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;

        $request->session()->forget(['cart']);
        // $this->TransaksiModel->addData($data);

        return $transaksi->save() ? redirect(route('pembayaran'))->with('alert-success', 'Transaksi berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    }
}
