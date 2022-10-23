<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuModel extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = [
        'nama_makanan','jenis_makanan','gambar','harga','keterangan'
    ];
    public function addData($data){
        DB::table('menu')->insert($data);
    }
    public function editData($id_menu, $data){
        DB::table('menu')->where('id_menu', $id_menu)->update($data);
    }
}
