<?php

namespace App\Http\Controllers;

use App\Models\Simulasi;
use App\Models\User;
use App\Models\Hasil;
use App\Models\Pernyataan;
use App\Models\BobotNilai;
use App\Models\JobFamily;
use App\Models\Parameter_Penilaian;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('next', '1');
        $data = Pernyataan::all()->first();

        $d = $data->id_pernyataan;
        $his_jab = Simulasi::where('pernyataan_id', $d)
            ->where('user_id', Auth::user()->id_user)->get();
        // $his_jab->nilai;



        // dd($his_jab->nilai->get());
        return view('user.asesmen.index', ([
            'data' => $data,
            'answer' => $his_jab
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Simulasi::updateOrCreate(
            [
                'user_id' => Auth::user()->id_user,
                'pernyataan_id' => $request->id_pernyataan,
            ],
            [
                'nilai' => $request->ans
            ]
        );
        $next = Session::get('next');
        $next += 1;

        Session::put("next", $next);
        $i = 0;
        $question = Pernyataan::all();

        foreach ($question as $quest) {
            // dd($question);
            $i++;
            if ($quest->count() < $next) {
                User::where('id_user', Auth::user()->id_user)->update(
                    [
                        'assesmen' => 'Y'
                    ]
                );
                $job_familys = JobFamily::where('nilai_core_faktor', '!=', '0')
                    ->where('nilai_sec_faktor', '!=', '0')->get();
                $hasil_simulasi = Simulasi::with('user', 'pernyataan')
                    ->whereHas('user', function ($query) {
                        $query->where('hak_akses', 'User')->where('assesmen', 'Y');
                    })->get();
                foreach ($job_familys as $j) {
                    $parameter = Parameter_Penilaian::where('job_family_id', $j->id_job_family)->get();
                    $bobot_nilai = 0;
                    foreach ($parameter as $p) {
                        foreach ($hasil_simulasi as $hs) {
                            $selisih = 0;
                            if ($hs->pernyataan->tema_bakat_id == $p->tema_bakat_id) {
                                // dd($hs->pernyataan->tema_bakat_id);
                                // dd($hs->nilai);
                                $selisih = $hs->nilai - $p->nilai;
                                switch ($selisih) {
                                    case '0':
                                        $bobot_nilai = 5;
                                        break;
                                    case '1':
                                        $bobot_nilai = 4.5;
                                        break;
                                    case '-1':
                                        $bobot_nilai = 4;
                                        break;
                                    case '2':
                                        $bobot_nilai = 3.5;
                                        break;
                                    case '-2':
                                        $bobot_nilai = 3;
                                        break;
                                    case '3':
                                        $bobot_nilai = 2.5;
                                        break;
                                    case '-3':
                                        $bobot_nilai = 2;
                                        break;
                                    case '4':
                                        $bobot_nilai = 1.5;
                                        break;
                                    case '-4':
                                        $bobot_nilai = 1;
                                        break;
                                }

                                BobotNilai::updateOrCreate(
                                    [
                                        'user_id' => $hs->user_id,
                                        'simulasi_id' => $hs->id_simulasi,
                                        'parameter_penilaian_id' => $p->id_parameter_penilaian
                                    ],
                                    [
                                        'nilai' => $bobot_nilai
                                    ]
                                );
                            }
                        }
                    }
                }

                $bobot = BobotNilai::with('user', 'parameter')->get();
                // dd($bobot);
                $data_bobot = array();
                foreach ($bobot as $row) {
                    array_push(
                        $data_bobot,
                        array(
                            'user_id' => $row['user_id'],
                            'job_family_id' => $row->parameter['job_family_id'],
                            'parameter_id' => $row['parameter_penilaian_id'],
                            'faktor' => $row->parameter['kategori_faktor'],
                            'nilai' => $row['nilai'],
                        )
                    );
                }
                // dd($data_bobot);
                $user = User::where('hak_akses', 'User')
                    ->where('assesmen', 'Y')->get();
                $perhitungan = array();
                // dd($user);
                $core = array();
                $sec = array();
                $NCF = 0;
                $NSF = 0;
                $IC = 0;
                $IS = 0;
                $N = 0;
                foreach ($job_familys as $job) {
                    foreach ($user as $u) {
                        foreach ($data_bobot as $db) {
                            // dd($db);
                            if ($db['user_id'] === $u->id_user && $db['job_family_id'] === $job->id_job_family && $db['faktor'] === "Core Faktor") {
                                $NCF = $NCF + $db['nilai'];
                                $IC++;
                            }
                            if ($db['user_id'] === $u->id_user && $db['job_family_id'] === $job->id_job_family && $db['faktor'] === "Secondary Faktor") {
                                $NSF +=  $db['nilai'];
                                $IS++;
                                // dd($NSF);
                            }
                        }
                        $N = (($job->nilai_core_faktor / 100) * ($NCF / $IC)) + (($job->nilai_sec_faktor / 100) * ($NSF / $IS));

                        array_push(
                            $perhitungan,
                            array(
                                'user_id' => $u->id_user,
                                'job_family_id' => $job->id_job_family,
                                'NCF' => round($NCF / $IC, 3),
                                'NSF' => round($NSF / $IS, 3),
                                'N' => round($N, 3)
                            )
                        );
                    }
                    foreach ($perhitungan as $hasil_akhir) {
                        Hasil::updateOrCreate(
                            [
                                'user_id' => $hasil_akhir['user_id'],
                                'job_family_id' => $hasil_akhir['job_family_id']
                            ],
                            [
                                'nilai' => $hasil_akhir['N']
                            ]
                        );
                    }
                }
                // dd($perhitungan);
                return view('user.asesmen.end');
            }
            if ($i == $next) {
                $q = $quest->id_pernyataan;
                $answ = Simulasi::where('pernyataan_id', $q)->where('user_id', Auth::user()->id_user)->get();
                // dd($answ);
                return view('user.asesmen.index', ([
                    'data' => $quest,
                    'answer' => $answ
                ]));
            }
        }
    }


    public function end()
    {
        // $data = Hasil::with('user', 'job_family')
        //     ->whereHas('user', function ($query) {
        //         $query->where('id_user', Auth::user()->id_user)->where('assesmen', 'Y');
        //     })->orderBy('nilai', 'DESC')->get();
        // dd($data);
        return view('user.asesmen.end');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Hasil::with('user', 'job_family')
            ->whereHas('user', function ($query) {
                $query->where('id_user', Auth::user()->id_user)->where('assesmen', 'Y');
            })->orderBy('nilai', 'DESC')->get();
        $id_job = array();
        foreach ($data as $d) {
            array_push(
                $id_job,
                array(
                    $d->job_family_id
                )
            );
        }
        // $data = DB::table('hasil')
        //     ->leftJoin('users', 'users.id_user', '=', 'hasil.user_id')
        //     ->leftJoin('job_family', 'job_family.id_job_family', '=', 'job_family.job_family_id')
        //     ->rightJoin('unit_kerja', 'unit_kerja.job_family_id', '=', 'job_family.id_job_family')
        //     ->get();
        $unit = UnitKerja::whereIn('job_family_id', $id_job)->orderBy('departemen', 'ASC')->get();
        // dd($data);
        return view('user.asesmen.hasil', [
            'data' => $data,
            'unit' => $unit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Simulasi $simulasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simulasi $simulasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simulasi $simulasi)
    {
        //
    }
}
