<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataCusrtomer = [
            [
                'token_customer' => uniqid(20),
                'name' =>  'anandamw',
                'email' =>  'ananda@gmail.com',
                'nomer_whatsapp' => '081233334',
                'pakets_id' => 1,
                'status' => 'success'
            ],
            [
                'token_customer' => uniqid(20),
                'name' =>  'wahyudi',
                'email' =>  'wahyudi@gmail.com',
                'nomer_whatsapp' => '088458454',
                'pakets_id' => 2,
                'status' => 'invalid'
            ]

        ];

        foreach ($dataCusrtomer as $item) {
            Customers::create($item);
        }
    }
}
