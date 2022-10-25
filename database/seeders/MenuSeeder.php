<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makanan = [
            [
                'nama_makanan' => 'Cah Taoge Ikan Asin',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Ikan asin jambal, taoge, bawang bombay, bawang putih, jahe, cabai, dan merica bubuk',
                'harga' => '21000',
                'gambar' => 'taogeikanasin.jpg'
            ],
            [
                'nama_makanan' => 'Nasi Pecel',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Kacang tanah, gula merah, gulapasir, cabai rawit, cabai keriting, bawang putih, daun jeruk, dan asam jawa',
                'harga' => '19000',
                'gambar' => 'nasipecel.jpg'
            ],
            [
                'nama_makanan' => 'Rujak Cingur',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Kangkung, taoge, timun, cingur sapi, tahu goreng, tempe, lontong, dan bumbu cingur',
                'harga' => '20000',
                'gambar' => 'rujakcingur.jpg'
            ],
            [
                'nama_makanan' => 'Ayam Gorang Moyang',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Bawang merah, bawang putih, cabai keriting, kemiri bubuk, merica putih bubuk, kencur, dan lengkuas',
                'harga' => '19000',
                'gambar' => 'ayammoyang.jpg'
            ],
            [
                'nama_makanan' => 'Ayam Bakar Nendes',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Ayam, daun salam, serai, gula pasir, gula merah, dan kaldu bubuk',
                'harga' => '19000',
                'gambar' => 'ayambakar.jpg'
            ],
            [
                'nama_makanan' => 'Nasi Goreng Merah',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Nasi, bawang putih, daun bawang, saos tomat, saos raja rasa, saos tiram, dan minyak wijen',
                'harga' => '16000',
                'gambar' => 'nasgormerah.jpg'
            ],
            [
                'nama_makanan' => 'Nasi Goreng Hongkong',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Nasi putih, jagung, wortel, daun bawang, margarine, telur, dan bawang putih',
                'harga' => '25000',
                'gambar' => 'nasgorhongkong.jpg'
            ],
            [
                'nama_makanan' => 'Mie Goreng Nendes',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Mie goreng, telur, dan sayur',
                'harga' => '16000',
                'gambar' => 'miegoreng.jpg'
            ],
            [
                'nama_makanan' => 'Mie Godhog Nendes',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Mie rebus, telur, dan sayur',
                'harga' => '16000',
                'gambar' => 'miegodhog.jpg'
            ],
            [
                'nama_makanan' => 'Tamie Capcay',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Mie, telur, bawang putih, dada ayam, bakso ikan, udang, air, wortel, dan brokoli',
                'harga' => '27000',
                'gambar' => 'tamiecapcay.jpg'
            ],
            [
                'nama_makanan' => 'Sop Buntut',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Buntut sapi, wortel, kentang, daun bawang, seledri, tomat merah, bawang bombay, dan cengkeh',
                'harga' => '40000',
                'gambar' => 'sopbuntut.jpg'
            ],
            [
                'nama_makanan' => 'Chicken Katsu',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Dada ayam filet, garam, bawang putih, marica, telur, tepung serbaguna, dan tepung panir',
                'harga' => '20000',
                'gambar' => 'katsu.jpg'
            ],
            [
                'nama_makanan' => 'Chicken Crispy',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Ayam, telur, bawang putih, bawang merah, ketumbar, merica, dan kunyit',
                'harga' => '20000',
                'gambar' => 'chickencrispy.jpg'
            ],
            [
                'nama_makanan' => 'Chicken Cordon Bleu',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Filet dada ayam, mozarella cheese, garam, dan lada',
                'harga' => '60000',
                'gambar' => 'cordonbleu.jpg'
            ],
            [
                'nama_makanan' => 'Pasta Aglio Olio',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Macaroni, dada ayam, sosis sapi, bawang putih, olive oil, lada, dan garam',
                'harga' => '14000',
                'gambar' => 'aglioolio.jpg'
            ],
            [
                'nama_makanan' => 'Pasta Carbonara',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Macaroni, susu uht plain, keju parut, smoked beef, bawang bombay, bawang putih, lada, dan garam',
                'harga' => '16000',
                'gambar' => 'carbonara.jpg'
            ],
            [
                'nama_makanan' => 'Iga Penyet Madura',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Daging iga, daun jeruk, daun salam, serai, lengkuas, jahe, bumbu ungkep iga, dan bawang merah',
                'harga' => '33000',
                'gambar' => 'igapenyetmadura.jpg'
            ],
            [
                'nama_makanan' => 'Sirloin Beef Steak',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Daging sirloin, black pepper, rosemary, bawang putih, garam, bahan saus, margarine, dan bawang bombay',
                'harga' => '80000',
                'gambar' => 'sirloin.jpg'
            ],
            [
                'nama_makanan' => 'Tenderloin Beef Steak',
                'jenis_makanan' => 'makanan',
                'keterangan' => 'Daging tenderloin, garam, lada, lada hitam, jahe parut, bawang putih, dan bahan saus',
                'harga' => '80000',
                'gambar' => 'tenderloin.jpg'
            ],
        ];

        $minuman = [
            [
                'nama_makanan' => 'Alpukat Ice',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Alpukat, gula aren, susu cair, es batu',
                'harga' => '15000',
                'gambar' => 'alpukat.jpg'
            ],
            [
                'nama_makanan' => 'Cappuccino Latte',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Bubuk kopi, creamer bubuk, susu uht fresh',
                'harga' => '25000',
                'gambar' => 'cappucinolatte.jpg'
            ],
            [
                'nama_makanan' => 'Chocolate Latte',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Kopi bubuk, susu kental manis, susu segar, es batu',
                'harga' => '20000',
                'gambar' => 'chocolatelatte.jpg'
            ],
            [
                'nama_makanan' => 'Chocolate Ice',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Susu uht, coklat bubuk, gula, garam, es batu, ice coklat',
                'harga' => '20000',
                'gambar' => 'chocoice.jpg'
            ],
            [
                'nama_makanan' => 'Coffe Latte',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Kopi bubuk, gula pasir, susu fresh',
                'harga' => '22000',
                'gambar' => 'coffelatte.jpg'
            ],
            [
                'nama_makanan' => 'Greenny Colber',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Bubuk greentea, susu cair full cream, gula pasir, es batu',
                'harga' => '21000',
                'gambar' => 'greenycolber.jpg'
            ],
            [
                'nama_makanan' => 'Lychee Iced Tea',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Teh, leci, es batu, gula pasir',
                'harga' => '17000',
                'gambar' => 'icelycheetea.jpg'
            ],
            [
                'nama_makanan' => 'Lychee Mojito',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Leci,air soda tawar, daun mint, es batu, gula pasir',
                'harga' => '22000',
                'gambar' => 'lycheemojito.jpg'
            ],
            [
                'nama_makanan' => 'NK SKY',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Soda biru, minuman jeruk, daun mint, es batu',
                'harga' => '20000',
                'gambar' => 'nksky.jpg'
            ],
            [
                'nama_makanan' => 'Red Velvet',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Bubuk red velvet, susu kental manis, es batu',
                'harga' => '20000',
                'gambar' => 'redlatte.jpg'
            ],
            [
                'nama_makanan' => 'Strawberry Milkshake',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Strawberry, susu uht, gula pasir, es batu',
                'harga' => '20000',
                'gambar' => 'strawberrymilkshake.jpg'
            ],
            [
                'nama_makanan' => 'Strawberry Mojito',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Strawberry, lemon, pucuk daun mint, soda putih, es batu',
                'harga' => '20000',
                'gambar' => 'strawberrymojito.jpg'
            ],
            [
                'nama_makanan' => 'Taro Latte',
                'jenis_makanan' => 'minuman',
                'keterangan' => 'Bubuk taro, susu kental manis, susu uht, es batu',
                'harga' => '20000',
                'gambar' => 'tarolatte.jpg'
            ],
        ];
        DB::table('menu')->insert($makanan);
        DB::table('menu')->insert($minuman);
    }
}
