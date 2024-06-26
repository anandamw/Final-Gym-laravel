<?php

namespace Database\Seeders;

use App\Models\Rekapitulasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekapitulasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rekap = [
            [
                "customers_id" => 1,
                "token_rekap" => uniqid(20),
                // "email" => "ananda@gmail.com",
                // "kategori_paket" => "3 Minggu",
                // "nomer_whatsapp" => "08232323232",
                "tanggal" => date('Y-m-d'),
                // "pakets_id" => 1
            ],
            [
                "customers_id" => 2,
                "token_rekap" => uniqid(20),
                // "email" => "wahyudi@gmail.com",
                // "kategori_paket" => "2 Minggu",
                // "nomer_whatsapp" => "08232323322",
                "tanggal" => date('Y-m-d'),
                // "pakets_id" => 2

            ]

        ];

        foreach ($rekap as $a) {
            Rekapitulasi::create($a);
        }
    }
}
