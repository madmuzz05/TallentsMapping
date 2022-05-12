<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatans = [
            [
                'kategori_jabatan' => 'Staff Muda',
            ],
            [
                'kategori_jabatan' => 'Vice President',
            ],
        ];

        foreach ($jabatans as $key => $jabatan) {
            Jabatan::create($jabatan);
        }
    }
}
