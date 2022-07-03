<?php

namespace App\Exports;

use App\Models\Pernyataan;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PernyataanExport implements FromView
{
    public function view(): View
    {
        $data = Pernyataan::with('tema_bakat')->where('instansi_id', Auth::user()->instansi_id)->get();
        // dd($data);
        return view('admin.pernyataan.export', [
            'data' => $data
        ]);
    }
}
