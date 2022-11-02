<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransaksiModel extends Model
{
    // use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meja(){
        return $this->belongsTo(MejaModel::class);
    }
    public function addData($data){
        DB::table('transaksi')->insert($data);
    }
}
