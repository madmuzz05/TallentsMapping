<?php

namespace App\Http\Controllers;

use App\Models\Simulasi;
use App\Models\Pernyataan;
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
        $his_jab = Simulasi::where('pernyataan_id', $d)->get();
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
        $next = Session::get('next');
        $next+=1;
        Simulasi::updateOrCreate([
            'user_id' => Auth::user()->id_user,
            'pernyataan_id' => $request->id_pernyataan
        ],
        ['nilai' => $request->ans]
    );

        Session::put("next", $next);
        $i=0;
        $question = Pernyataan::all();
        
        foreach ($question as $quest) {
            // dd($question);
            $i++;
            if ($quest->count() < $next) {
                return view('user.asesmen.end');
            }
            if ($i == $next) {
                $q = $quest->id_pernyataan;
                $answ = Simulasi::where('pernyataan_id', $q)->get();
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
