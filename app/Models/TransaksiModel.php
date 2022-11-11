<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiModel extends Model
{
    // use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'tagihan', 'pesanan', 'tanggal_transaksi'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meja(){
        return $this->belongsTo(MejaModel::class);
    }
    public function addData($data){
        DB::table('transaksi')->insert($data);
    }
    public function detailData($id_transaksi){
        return DB::table('transaksi')->where('id_transaksi', $id_transaksi)
        ->join('users', 'users.id', '=', 'transaksi.id')
        ->join('meja', 'meja.id_meja', '=', 'transaksi.id')
        ->first();
    }
    public function allData(){
        return DB::table('transaksi')
        ->join('users', 'users.id', '=', 'transaksi.id')
        ->join('meja', 'meja.id_meja', '=', 'transaksi.id')
        ->get()->sortByDesc('tanggal_transaksi');
    }
    public function editData($id_transaksi, $data){
        DB::table('transaksi')->where('id_transaksi', $id_transaksi)->update($data);
    }
}
