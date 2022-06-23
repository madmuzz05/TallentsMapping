<?php

namespace App\Imports;

use App\Models\TemaBakat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TemaBakatImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new TemaBakat([
            'nama_tema' => $row['nama_tema'],
            'deskripsi' => $row['deskripsi'],
        ]);
    }
}
