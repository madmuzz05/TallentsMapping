<?php

namespace App\Exports;

use App\Models\UnitKerja;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class UnitKerjaExport implements FromView
{
    public function view(): View
    {
        $data = UnitKerja::with('job_family')->where('instansi_id', Auth::user()->instansi_id)->get();
        return view('admin.unit_kerja.export', [
            'data' => $data
        ]);
    }
}
