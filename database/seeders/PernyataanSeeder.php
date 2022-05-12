<?php

namespace Database\Seeders;

use App\Models\Pernyataan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PernyataanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pernyataans = [
            [
                'pernyataan' => 'Membuat Konsep Berdasarkan Apa Yang Dilihat, Dialami Atau Diyakini',
                'tema_bakat_id' => '1',
            ],
            [
                'pernyataan' => 'Mengoreksi Tulisan Yang Dibuat Sebelumnya Untuk Dipublikasikan',
                'tema_bakat_id' => '2',
            ],
            [
                'pernyataan' => 'Menulis Artikel, Ide, Dokumen, Cerita Ataupun Alat Bantu Pendidikan',
                'tema_bakat_id' => '3',
            ],
        ];

        foreach ($pernyataans as $key => $pernyataan) {
            Pernyataan::create($pernyataan);
        }
    }
}
