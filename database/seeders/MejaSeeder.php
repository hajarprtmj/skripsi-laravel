<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meja = [
            ['no_meja' => 'Meja A-1',],
            ['no_meja' => 'Meja A-2',],
            ['no_meja' => 'Meja A-3',],
            ['no_meja' => 'Meja A-4',],
            ['no_meja' => 'Meja A-5',],
            ['no_meja' => 'Meja A-6',],
            ['no_meja' => 'Meja A-7',],
        ];
        DB::table('meja')->insert($meja);
        // php artisan db:seed --class=MejaSeeder
    }
}
