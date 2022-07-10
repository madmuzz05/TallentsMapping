<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromView
{
    public function view(): View
    {
        $data = User::with('instansi', 'unit_kerja')->where('instansi_id', Auth::user()->instansi_id)->get();
        return view('admin.user.export', [
            'data' => $data
        ]);
    }
}
