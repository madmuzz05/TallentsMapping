<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nama' => 'User',
                'email' => 'user@tm.com',
                'hak_akses' => 'user',
                'unit_kerja_id' => '1',
                'jabatan_id' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'nama' => 'Admin',
                'email' => 'admin@tm.com',
                'hak_akses' => 'admin',
                'unit_kerja_id' => '2',
                'jabatan_id' => '1',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
