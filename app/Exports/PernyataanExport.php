<?php

namespace App\Exports;

use App\Models\Pernyataan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PernyataanExport implements FromView
{
    public function view(): View
    {
        $data = Pernyataan::all();
        return view('admin.pernyataan.export', [
            'data' => $data
        ]);
    }
}
