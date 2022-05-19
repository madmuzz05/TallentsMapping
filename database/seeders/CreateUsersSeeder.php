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
                'alamat' => 'lorep Ipsum',
                'telepon' => '08221398132',
                'no_pegawai' => 'P8812',
                'hak_akses' => 'user',
                'unit_kerja_id' => '1',
                'jabatan_id' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'nama' => 'Admin',
                'email' => 'admin@tm.com',
                'alamat' => 'lorep Ipsum',
                'telepon' => '08442353981',
                'no_pegawai' => 'P8832',
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
