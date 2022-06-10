<?php

namespace App\Imports;

use App\Models\Jabatan;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{

    private $unit_kerjas;
    private $jabatans;

    public function __construct()
    {
        $this->unit_kerjas = UnitKerja::all();
        $this->jabatans = Jabatan::all();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $unit_kerja = $this->unit_kerjas->where('nama_unit_kerja', $row['unit_kerja'])->first();
        $jabatan = $this->jabatans->where('kategori_jabatan', $row['jabatan'])->first();
        return new User([
            'no_pegawai' => $row['no_pegawai'],
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'telepon' => $row['telepon'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'hak_akses' => $row['hak_akses'],
            'unit_kerja_id' => $unit_kerja->id_unit_kerja ?? NULL,
            'jabatan_id' => $jabatan->id_jabatan ?? NULL,
        ]);
    }
}
