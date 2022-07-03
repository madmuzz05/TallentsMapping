<?php

namespace App\Exports;

use App\Models\JobFamily;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class JobFamilyExport implements FromView
{
    public function view(): View
    {
        $data = JobFamily::where('instansi_id', Auth::user()->instansi_id)->get();
        return view('admin.job_family.export', [
            'data' => $data
        ]);
    }
}
