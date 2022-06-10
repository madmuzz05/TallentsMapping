<?php

namespace App\Exports;

use App\Models\Jabatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JabatanExport implements FromView
{
    public function view(): View
    {
        $data = Jabatan::all();
        return view('admin.jabatan.export', [
            'data' => $data
        ]);
    }
}
