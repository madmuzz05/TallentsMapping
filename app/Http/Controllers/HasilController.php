<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\JobFamily;
use App\Models\Parameter_Penilaian;
use App\Models\Simulasi;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hasil.end');
    }

    public function getHasil()
    {
        $users = User::where('hak_akses', 'User')->where('assesmen', 'Y')->get();
        $simulasis = Simulasi::with('user', 'pernyataan')->get();
        $parameters = Parameter_Penilaian::all();
        $job_familys = JobFamily::where('nilai_core_faktor', '!=', '0')
            ->where('nilai_sec_faktor', '!=', '0')->get();
        return response()->json([
            'users' => $users,
            'simulasis' => $simulasis,
            'parameters' => $parameters,
            'job_familys' => $job_familys
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil $hasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil $hasil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hasil $hasil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hasil  $hasil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil $hasil)
    {
        //
    }
}
