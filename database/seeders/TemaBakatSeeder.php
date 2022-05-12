<?php

namespace Database\Seeders;

use App\Models\TemaBakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemaBakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tema_bakats = [
            [
                'nama_tema' => 'CONCEPTUALIZING',
            ],
            [
                'nama_tema' => 'EDITING',
            ],
            [
                'nama_tema' => 'WRITING',
            ],
        ];

        foreach ($tema_bakats as $key => $tema_bakat) {
            TemaBakat::create($tema_bakat);
        }
    }
}
