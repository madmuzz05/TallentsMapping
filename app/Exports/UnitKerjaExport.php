<?php

namespace App\Exports;

use App\Models\UnitKerja;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UnitKerjaExport implements FromView
{
    public function view(): View
    {
        $data = UnitKerja::all();
        return view('admin.unit_kerja.export', [
            'data' => $data
        ]);
    }
}
