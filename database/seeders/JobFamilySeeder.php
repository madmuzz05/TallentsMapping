<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobFamily;

class JobFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_familys = [
            [
                'kode' => 'OPS',
                'job_family' => 'OPERASIONAL'
            ],
            [
                'kode' => 'PEML',
                'job_family' => 'PEMELIHARAAN'
            ],
            [
                'kode' => 'ENG',
                'job_family' => 'ENGINEERING/ KONSTRUKSI'
            ],
            [
                'kode' => 'SAR',
                'job_family' => 'PEMASARAN'
            ],
            [
                'kode' => 'KEU',
                'job_family' => 'KEUANGAN'
            ],
            [
                'kode' => 'RENB',
                'job_family' => 'PERENCANAAN & PENGEMBANGAN'
            ],
            [
                'kode' => 'SDM',
                'job_family' => 'MANAJEMEN SDM'
            ],
            [
                'kode' => 'SUP',
                'job_family' => 'MANAJEMEN PENGADAAN'
            ],
            [
                'kode' => 'SEKR',
                'job_family' => 'SEKRETARIS PERUSAHAAN, CORPORATE COMMUNICATION & UMUM'
            ],
            [
                'kode' => 'AUD',
                'job_family' => 'AUDIT'
            ],
            [
                'kode' => 'HUK',
                'job_family' => 'HUKUM'
            ]
            ];
            foreach ($job_familys as $key => $job_family) {
                JobFamily::create($job_family);
            }
    }
}
