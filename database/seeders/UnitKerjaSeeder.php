<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_kerjas = [
            [
                'nama_unit_kerja' => 'Dep. Pengembangan & Organisasi',
            ],
            [
                'nama_unit_kerja' => 'Dep. Keuangan',
            ],
            [
                'nama_unit_kerja' => 'Dep Perencanaan & Penerimaan Barang/Jasa',
            ],
        ];

        foreach ($unit_kerjas as $key => $unit_kerja) {
            UnitKerja::create($unit_kerja);
        }
    }
}
