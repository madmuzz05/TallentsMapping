<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromView
{
    public function view(): View
    {
        $data = User::with('jabatan', 'unit_kerja')->get();
        return view('admin.user.export', [
            'data' => $data
        ]);
    }
}
