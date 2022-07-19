<?php

namespace App\Http\Controllers;

use App\Models\Simulasi;
use App\Models\User;
use App\Models\Hasil;
use App\Models\Pernyataan;
use App\Models\BobotNilai;
use App\Models\JobFamily;
use App\Models\Parameter_Penilaian;
use App\Models\TemaBakat;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pernyataan::select([
            'pernyataan.*',
            DB::raw('nama_tema as tema_bakat'),
            DB::raw('id_tema_bakat as id_tema')
        ])
            ->where('pernyataan.instansi_id', Auth::user()->instansi_id)
            ->leftjoin('tema_bakat', 'tema_bakat.id_tema_bakat', '=', 'pernyataan.tema_bakat_id')->paginate(1);
        foreach ($data as $key => $d) {
            $his_jab = Simulasi::where('pernyataan_id', $d->id_pernyataan)
                ->where('user_id', Auth::user()->id_user)->get();
            // $his_jab->nilai;
        }
        $question = Pernyataan::select([
            'pernyataan.*',
            DB::raw('nama_tema as tema_bakat'),
            DB::raw('id_tema_bakat as id_tema')
        ])
            ->where('pernyataan.instansi_id', Auth::user()->instansi_id)
            ->leftjoin('tema_bakat', 'tema_bakat.id_tema_bakat', '=', 'pernyataan.tema_bakat_id')->count();
        $total = Simulasi::where('user_id', Auth::user()->id_user)->count();
        return view('user.asesmen.index', ([
            'data' => $data,
            'answer' => $his_jab,
            'tanyaan' => ($question - 2),
            'total' => $total
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

    public function pembobotan_pernyataan()
    {
        $hasil_simulasi = Simulasi::with('user', 'pernyataan')
            ->whereHas('user', function ($query) {
                $query->where('hak_akses', 'User')->where('assesmen', 'Y');
            })->get();
        $tema = TemaBakat::where('instansi_id', Auth::user()->instansi_id)->orderBy('nama_tema', 'asc')->get();
        $bobot_pernyataan = array();
        $nilai_pernyataan = 0;
        $iteration = 0;
        foreach ($tema as $t) {
            foreach ($hasil_simulasi as $hs) {
                if ($hs->pernyataan->tema_bakat_id == $t->id_tema_bakat) {
                    $pernyataan = Pernyataan::select([
                        'pernyataan.*',
                        DB::raw('nama_tema as tema_bakat'),
                        DB::raw('id_tema_bakat as id_tema')
                    ])
                        ->leftjoin('tema_bakat', 'tema_bakat.id_tema_bakat', '=', 'pernyataan.tema_bakat_id')
                        ->where('pernyataan.instansi_id', Auth::user()->instansi_id)
                        ->where('pernyataan.tema_bakat_id', $t->id_tema_bakat)->get();
                    // dd($pernyataan);
                    foreach ($pernyataan as $p) {
                        if ($hs->pernyataan_id == $p->id_pernyataan) {
                            $iteration = $hs->nilai * $p->bobot_nilai;
                        }
                    }
                    array_push(
                        $bobot_pernyataan,
                        array(
                            'user_id' => $hs->user_id,
                            'pernyataan_id' => $hs->pernyataan_id,
                            'tema_bakat_id' => $hs->pernyataan->tema_bakat_id,
                            'nilai' => $iteration,
                        )
                    );
                }
            }
        }
        // dd($bobot_pernyataan);
        $akhir_bobot = array();
        $user =  User::with('jabatan', 'unit_kerja')->where('hak_akses', 'User')->where('assesmen', 'Y')->where('instansi_id', Auth::user()->instansi_id)->get();
        foreach ($user as $u) {
            foreach ($tema as $t) {
                foreach ($bobot_pernyataan as $bp) {
                    if ($bp['user_id'] == $u->id_user && $bp['tema_bakat_id'] == $t->id_tema_bakat) {
                        $nilai_pernyataan += $bp['nilai'];
                    }
                }
                array_push(
                    $akhir_bobot,
                    array(
                        'user_id' => $u->id_user,
                        'tema_bakat_id' => $t->id_tema_bakat,
                        'nilai' => round($nilai_pernyataan),
                    )
                );
                $nilai_pernyataan = 0;
            }
        }
        // dd($akhir_bobot);
        return $akhir_bobot;
    }

    public function rumus()
    {
        $job_familys = JobFamily::where('nilai_core_faktor', '!=', '0')
            ->where('nilai_sec_faktor', '!=', '0')->where('instansi_id', Auth::user()->instansi_id)->get();

        $akhir_bobot = $this->pembobotan_pernyataan();
        // dd($hasil);
        // $bobot_nilai = array();
        foreach ($job_familys as $j) {
            $parameter = Parameter_Penilaian::where('job_family_id', $j->id_job_family)->get();
            foreach ($parameter as $p) {
                $bobot_nilai = 0;
                foreach ($akhir_bobot as $hs) {
                    $selisih = 0;
                    if ($hs['tema_bakat_id'] == $p->tema_bakat_id) {
                        // dd($hs->pernyataan->tema_bakat_id);
                        // dd($hs->nilai);
                        $selisih = $hs['nilai'] - $p->nilai;

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
                                'user_id' => $hs['user_id'],
                                'tema_bakat_id' => $hs['tema_bakat_id'],
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

        $bobot = BobotNilai::with('user', 'parameter')
            ->whereHas('user', function ($query) {
                $query->where('instansi_id', Auth::user()->instansi_id)->where('assesmen', 'Y');
            })->orderBy('user_id', 'asc')
            ->get();
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
            ->where('assesmen', 'Y')->where('instansi_id', Auth::user()->instansi_id)->get();
        $perhitungan = array();
        // dd($user);
        $core = array();
        $sec = array();
        foreach ($job_familys as $job) {
            $NCF = 0;
            $NSF = 0;
            $IC = 0;
            $IS = 0;
            $N = 0;
            foreach ($user as $u) {
                $param = Parameter_Penilaian::where('job_family_id', $job->id_job_family)->get();
                foreach ($param as $p) {
                    // dd($p->id_parameter_penilaian);
                    foreach ($data_bobot as $db) {
                        // dd($db);
                        if ($db['user_id'] == $u->id_user && $db['job_family_id'] == $job->id_job_family && $db['faktor'] == "Core Faktor" && $db['parameter_id'] == $p->id_parameter_penilaian) {
                            $NCF = $NCF + $db['nilai'];
                            $IC++;
                        }
                        if ($db['user_id'] == $u->id_user && $db['job_family_id'] == $job->id_job_family && $db['faktor'] == "Secondary Faktor" && $db['parameter_id'] == $p->id_parameter_penilaian) {
                            $NSF +=  $db['nilai'];
                            $IS++;
                            // dd($NSF);
                        }
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
                        'nilai' => $hasil_akhir['N'],
                        'NCF' => $hasil_akhir['NCF'],
                        'NSF' => $hasil_akhir['NSF'],
                    ]
                );
            }
        }
        // dd($perhitungan);
        return $perhitungan;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Pernyataan::select([
            'pernyataan.*',
            DB::raw('nama_tema as tema_bakat'),
            DB::raw('id_tema_bakat as id_tema')
        ])
            ->where('pernyataan.instansi_id', Auth::user()->instansi_id)
            ->leftjoin('tema_bakat', 'tema_bakat.id_tema_bakat', '=', 'pernyataan.tema_bakat_id')->count();
        $total = Simulasi::where('user_id', Auth::user()->id_user)->count();
        Simulasi::updateOrCreate(
            [
                'user_id' => Auth::user()->id_user,
                'pernyataan_id' => $request->id_pernyataan,
            ],
            [
                'nilai' => $request->ans,
                'created_at' => Carbon::now()
            ]
        );
        if (!empty($request->sudah) && $total == $question) {
            User::where('id_user', Auth::user()->id_user)->update(
                [
                    'assesmen' => 'Y'
                ]
            );
        }
        $data = Pernyataan::select([
            'pernyataan.*',
            DB::raw('nama_tema as tema_bakat'),
            DB::raw('id_tema_bakat as id_tema')
        ])
            ->where('pernyataan.instansi_id', Auth::user()->instansi_id)
            ->leftjoin('tema_bakat', 'tema_bakat.id_tema_bakat', '=', 'pernyataan.tema_bakat_id')->paginate(1);
        foreach ($data as $key => $d) {
            $his_jab = Simulasi::where('pernyataan_id', $d->id_pernyataan)
                ->where('user_id', Auth::user()->id_user)->get();
            // $his_jab->nilai;
        }
        if ($request->ajax()) {
            return view('user.asesmen.data', ([
                'data' => $data,
                'answer' => $his_jab,
                'tanyaan' => ($question - 2),
                'total' => $total
            ]))->render();
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
    public function show(Request $request)
    {
        $rumus = $this->rumus();
        // dd($rumus);
        $data = Hasil::with('user', 'job_family')
            ->whereHas('user', function ($query) {
                $query->where('id_user', Auth::user()->id_user)->where('assesmen', 'Y');
            })->orderBy('nilai', 'DESC')->take(5)->get();
        $hasil_rekom = array();
        $id_job = array();
        foreach ($data as $d) {
            array_push(
                $hasil_rekom,
                array(
                    'job_family' => $d->job_family->job_family,
                    'nilai' => $d->nilai
                )
            );
            array_push(
                $id_job,
                array(
                    $d->job_family_id
                )
            );
        }
        // dd($hasil);
        $unit = UnitKerja::whereIn('job_family_id', $id_job)->where('instansi_id', Auth::user()->instansi_id)->orderBy('departemen', 'ASC')->get();
        $sql1 = 'SELECT a.user_id, a.pernyataan_id, c.nama_tema, a.nilai, c.deskripsi FROM simulasi a LEFT JOIN pernyataan b ON a.pernyataan_id = b.id_pernyataan LEFT JOIN tema_bakat c
        ON b.tema_bakat_id = c.id_tema_bakat WHERE a.user_id = ? ORDER BY a.nilai DESC LIMIT 5';
        $kekuatan = DB::select($sql1, [Auth::user()->id_user]);
        $hasil_kuat = array();
        foreach ($kekuatan as $power) {
            array_push(
                $hasil_kuat,
                array(
                    'nama_tema' => $power->nama_tema,
                    'nilai' => $power->nilai
                )
            );
        }

        $sql2 = 'SELECT a.user_id, a.pernyataan_id, c.nama_tema, a.nilai, c.deskripsi FROM simulasi a LEFT JOIN pernyataan b ON a.pernyataan_id = b.id_pernyataan LEFT JOIN tema_bakat c
        ON b.tema_bakat_id = c.id_tema_bakat WHERE a.user_id = ? and a.nilai > 0 ORDER BY a.nilai ASC LIMIT 5';
        $kelemahan = DB::select($sql2, [Auth::user()->id_user]);
        $hasil_lemah = array();
        foreach ($kelemahan as $lemah) {
            array_push(
                $hasil_lemah,
                array(
                    'nama_tema' => $lemah->nama_tema,
                    'nilai' => $lemah->nilai
                )
            );
        }
        // dd($hasil_lemah);
        if ($request->ajax()) {
            return response()->json([
                'data' => $hasil_rekom,
                'kekuatan' => $hasil_kuat,
                'kelemahan' => $hasil_lemah,
            ]);
        }
        // dd($kelemahan);
        return view('user.asesmen.hasil', [
            'data' => $data,
            'unit' => $unit,
            'kelemahan' => $kelemahan,
            'kekuatan' => $kekuatan,
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
