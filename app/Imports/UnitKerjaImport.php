<?php

namespace App\Imports;

use App\Models\UnitKerja;
use App\Models\JobFamily;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitKerjaImport implements ToModel, WithHeadingRow
{

    private $job_familys;

    public function __construct()
    {
        $this->job_familys = JobFamily::all();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $job_family = $this->job_familys->where('job_family', $row['job_family'])->first();
        return new UnitKerja([
            'kode' => $row['kode'],
            'job_family_id' => $job_family->id_job_family ?? NULL,
            'departemen' => $row['departemen'],
        ]);
    }
}
