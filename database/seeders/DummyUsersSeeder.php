<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataUsers = [
            [
                'token_users' => uniqid(),
                'name' => 'Ananda Maulana Wahyudi',
                'username' => 'nndmw',
                'password' => bcrypt('123'),
                'role' => 'admin'
            ],
            [
                'token_users' => uniqid(),
                'name' => 'siapa akuu ??',
                'username' => 'cakto',
                'password' => bcrypt('123'),
                'role' => 'karyawan'
            ],

        ];

        foreach ($dataUsers as $user) {
            User::create($user);
        }
    }
}
