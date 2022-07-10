<?php

namespace App\Imports;

use App\Models\Pernyataan;
use App\Models\TemaBakat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class PernyataanImport implements ToModel, WithHeadingRow
{

    private $tema_bakats;

    public function __construct()
    {
        $this->tema_bakats = TemaBakat::all();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $tema_bakat = $this->tema_bakats->where('nama_tema', $row['tema_bakat'])->first();
        return new Pernyataan([
            'pernyataan' => $row['pernyataan'],
            'tema_bakat_id' => $tema_bakat->id_tema_bakat ?? NULL,
            'bobot_nilai' => $row['bobot_nilai'],
            'instansi_id' => Auth::user()->instansi_id,
        ]);
    }
}
