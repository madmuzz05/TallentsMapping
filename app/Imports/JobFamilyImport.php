<?php

namespace App\Imports;

use App\Models\JobFamily;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JobFamilyImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new JobFamily([
            'kode' => $row['kode'],
            'job_family' => $row['job_family'],
            'instansi_id' => Auth::user()->instansi_id,
        ]);
    }
}
