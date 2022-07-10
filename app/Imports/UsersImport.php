<?php

namespace App\Imports;

use App\Models\Instansi;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class UsersImport implements ToModel, WithHeadingRow
{

    private $unit_kerjas;
    private $instansis;

    public function __construct()
    {
        $this->unit_kerjas = UnitKerja::all();
        $this->instansis = Instansi::all();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $unit_kerja = $this->unit_kerjas->where('departemen', $row['unit_kerja'])->first();
        $instansi = $this->instansis->where('nama_instansi', $row['instansi'])->first();
        return new User([
            'no_pegawai' => $row['no_pegawai'],
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'telepon' => $row['telepon'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'hak_akses' => $row['hak_akses'],
            'unit_kerja_id' => $unit_kerja->id_unit_kerja ?? NULL,
            'instansi_id' => Auth::user()->instansi_id,
        ]);
    }
}
