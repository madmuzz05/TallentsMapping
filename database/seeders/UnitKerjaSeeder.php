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
                'job_family_id' => 7,
                'departemen' => 'Dep. Pengembangan & Organisasi',
            ],
            [
                'job_family_id' => 5,
                'departemen' => 'Dep. Keuangan',
            ],
            [
                'job_family_id' => 8,
                'departemen' => 'Dep Perencanaan & Penerimaan Barang/Jasa',
            ],
        ];

        foreach ($unit_kerjas as $key => $unit_kerja) {
            UnitKerja::create($unit_kerja);
        }
    }
}
