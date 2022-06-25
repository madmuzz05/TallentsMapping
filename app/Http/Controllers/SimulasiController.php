<?php

namespace App\Http\Controllers;

use App\Models\Simulasi;
use App\Models\User;
use App\Models\Hasil;
use App\Models\Pernyataan;
use App\Models\BobotNilai;
use App\Models\JobFamily;
use App\Models\Parameter_Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

        $job_familys = JobFamily::where('nilai_core_faktor', '!=', '0')
        ->where('nilai_sec_faktor', '!=', '0')->get();
        foreach ($job_familys as $j ) {
            $parameter = Parameter_Penilaian::where('job_family_id', $j->id_job_family)->get();
            $bobot_nilai = 0;
            foreach ($parameter as $p ) {
                $selisih=0;
                if ($request->id_tema_bakat == $p->tema_bakat_id) {
                    // dd($p->nilai);
                    $selisih = $request->ans - $p->nilai;
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
                                    'user_id' => Auth::user()->id_user,
                                    'simulasi_id' => $data->id_simulasi,
                                    'parameter_penilaian_id' => $p->id_parameter_penilaian
                                ],
                                [
                                    'nilai' => $bobot_nilai
                                ]
                            );
                        } 
                        
                    }
                }   
                
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

                $bobot = BobotNilai::with('user', 'parameter')->get();
                $data_bobot = Array();
                foreach ($bobot as $row){
                    array_push($data_bobot, 
                        array(
                            'user_id'=>$row['user_id'],
                            'job_family_id'=>$row->parameter['job_family_id'],
                            'parameter_id'=>$row['parameter_penilaian_id'],
                            'faktor'=>$row->parameter['kategori_faktor'],
                            'nilai'=>$row['nilai'],
                        )
                    );
                }
                // dd($data_bobot);
                $user = User::where('hak_akses', 'User')
                                    ->where('assesmen', 'Y')->get();
                                    $job_familys = JobFamily::where('nilai_core_faktor', '!=', '0')
                                    ->where('nilai_sec_faktor', '!=', '0')->get();
                $perhitungan = Array();
                $NCF=0;
                $NSF=0;
                $IC=0;
                $IS=0;
                $N=0;
                // dd($user);
                foreach ($job_familys as $job ) {
                        foreach ($user as $u ) {
                            foreach ($data_bobot as $db ) {
                                if ($db['user_id'] == $u->id_user && $db['job_family_id'] == $job->id_job_family && $db['faktor'] == "Core Faktor") {
                                    $NCF +=  $db['nilai'];
                                    $IC++;
                                }elseif($db['user_id'] == $u->id_user && $db['job_family_id'] == $job->id_job_family && $db['faktor'] == "Secondary Faktor"){
                                    $NSF +=  $db['nilai'];
                                    $IS++;
                                }
                            }
                            $N=(($job->nilai_core_faktor/100)*($NCF/$IC))+(($job->nilai_sec_faktor/100)*($NSF/$IS));
                            // dd($N);
                            
                            array_push($perhitungan, 
                                array(
                                    'user_id'=>$u->id_user,
                                    'job_family_id'=>$job->id_job_family,
                                    'NCF'=> $NCF/$IC,
                                    'NSF'=>$NSF/$IS,
                                    'N'=>$N
                                )
                            );
                        }
                    }
                    foreach ($perhitungan as $hasil_akhir) {
                        Hasil::updateOrCreate(
                            [
                                'user_id' => $hasil_akhir['user_id'],
                                'job_family_id'=> $hasil_akhir['job_family_id']
                            ],
                            [
                                'nilai' => $hasil_akhir['N']
                            ]
                            );
                        }
                        dd($perhitungan);

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
        return view('user.asesmen.end');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function show(Simulasi $simulasi)
    {
        //
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
