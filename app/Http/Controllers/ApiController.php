<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function payment_handler(Request $request){
        $json = json_decode($request->getContent());
        $signature_key = hash('sha512',$json->id_transaksi . $json->status_code . $json->gross_amount . 'SB-Mid-server-GMJlDx7Rz_ez0loB0PvhYOg5');

        if($signature_key != $json->signature_key){
            return abort(404);
        }

        //status berhasil
        $transaksi = TransaksiModel::where('id_transaksi', $json->id_transaksi)->first();
        return $transaksi->update(['status'=>$json->transaction_status]);
    }
}
