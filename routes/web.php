<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\riwayatTransaksi;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout.home');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('menu', MenuController::class);
Route::resource('meja', MejaController::class);
Route::resource('riwayat-transaksi', riwayatTransaksi::class);

// Cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id_menu}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('delete', [CartController::class, 'deleteCart'])->name('deleteCart');

// transaksi
Route::get('transaksi', [CartController::class, 'transaksi'])->name('transaksi');
Route::post('/transaksi/simpan', [CartController::class, 'simpanTransaksi'])->name('add.transaksi');

// Pembayaran
Route::get('bayar', [CartController::class, 'pembayaran'])->name('pembayaran');
Route::post('simpan-pemabayaran', [CartController::class, 'simpanPembayaran'])->name('simpanPembayaran');
