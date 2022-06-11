<?php

namespace App\Exports;

use App\Models\TemaBakat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TemaBakatExport implements FromView
{
    public function view(): View
    {
        $data = TemaBakat::all();
        return view('admin.tema_bakat.export', [
            'data' => $data
        ]);
    }
}
