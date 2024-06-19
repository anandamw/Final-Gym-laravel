<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataPakets = [
            [
                "token_paket" => uniqid(),
                "kategori_paket" => '1 Bulan',
                "harga_paket" => 70000,
            ],
            [
                "token_paket" => uniqid(),
                "kategori_paket" => '3 Bulan',
                "harga_paket" => 200000,
            ],
            [
                "token_paket" => uniqid(),
                "kategori_paket" => '1 Minggu',
                "harga_paket" => 20000,
            ],
            [
                "token_paket" => uniqid(),
                "kategori_paket" => '2 Minggu',
                "harga_paket" => 40000,
            ],
        ];

        foreach ($dataPakets as $item){
            Paket::create($item);
        };
    }
}
