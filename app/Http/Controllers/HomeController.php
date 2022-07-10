<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use App\Models\Hasil;
use App\Models\Simulasi;
use App\Models\UnitKerja;
use App\Models\JobFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id = Auth::user()->id_user;
        $getUser = User::with('jabatan', 'unit_kerja')
            ->where('id_user', $id)
            ->get();
        // dd($getUser);

        if ($request->ajax()) {
            return response()->json([
                'data' => $getUser
            ]);
        }
        return view('user.index', compact('getUser'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexAdmin(Request $request)
    {
        $rumus6 = (new SimulasiController)->rumus();
        $id = Auth::user()->id_user;
        $getUser = User::with('jabatan', 'unit_kerja')->where('hak_akses', 'User')->where('instansi_id', Auth::user()->instansi_id)->count();
        $sudah = User::with('jabatan', 'unit_kerja')->where('hak_akses', 'User')->where('assesmen', 'Y')->where('instansi_id', Auth::user()->instansi_id)->count();
        $belum = User::with('jabatan', 'unit_kerja')->where('hak_akses', 'User')->where('assesmen', 'N')->where('instansi_id', Auth::user()->instansi_id)->count();
        $assesmen = DB::select('SELECT DATE_FORMAT(simulasi.created_at, "%M") AS bulan, count(DATE_FORMAT(simulasi.created_at, "%M")) AS total FROM simulasi LEFT JOIN users ON users.id_user = simulasi.user_id WHERE users.hak_akses = "User" and users.instansi_id = ? Group by bulan', [Auth::user()->instansi_id]);
        $job_familys = JobFamily::where('nilai_core_faktor', '!=', '0')
            ->where('nilai_sec_faktor', '!=', '0')->where('instansi_id', Auth::user()->instansi_id)->get();
        $akhir = array();
        foreach ($job_familys as $j) {
            $i = 0;
            // dd($j->job_family);
            $hasil = DB::select('SELECT * FROM hasil WHERE job_family_id = ? ORDER BY nilai DESC LIMIT 3', [$j->id_job_family]);
            foreach ($hasil as $h) {
                $i++;
            }
            array_push(
                $akhir,
                array(
                    'nama' => $j->job_family,
                    'total' => $i
                )
            );
        }

        $byJob = Hasil::with('user', 'job_family')
            ->whereHas('user', function ($query) {
                $query->where('instansi_id', Auth::user()->instansi_id)->where('assesmen', 'Y');
            })
            ->orderBy('nilai', 'desc')->get()->unique('job_family_id');
        $byUsers = Hasil::with('user', 'job_family')
            ->whereHas('user', function ($query) {
                $query->where('instansi_id', Auth::user()->instansi_id)->where('assesmen', 'Y');
            })
            ->orderBy('nilai', 'desc')->get()->unique('user_id');
        // dd($assesmen);
        if ($request->ajax()) {
            return response()->json([
                'assesmen' => $assesmen,
                'rekomendasi' => $akhir,
            ]);
        }

        return view('admin.index', compact('getUser', 'sudah', 'belum', 'byJob', 'byUsers'));
    }
}
