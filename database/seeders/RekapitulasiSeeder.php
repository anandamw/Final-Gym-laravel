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
                // "name" => "ananda maulana wahyudi",
                // "email" => "ananda@gmail.com",
                // "kategori_paket" => "3 Minggu",
                // "nomer_whatsapp" => "08232323232",
                "tanggal" => date('Y-m-d'),
                // "pakets_id" => 1
            ],
            [
                "customers_id" => 2,
                // "name" => "ananda mw",
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
