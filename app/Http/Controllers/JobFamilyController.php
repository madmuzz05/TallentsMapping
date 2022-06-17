<?php

namespace App\Http\Controllers;

use App\Models\JobFamily;
use Illuminate\Http\Request;

class JobFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function getJobFamily()
    {
        $data = JobFamily::all();
        return response()->json([
            'data' => $data
        ]);
    }
    public function getJobFamilySelect2()
    {
        $data = JobFamily::all();
        if (isset($request->q)) {
            $data = JobFamily::where('job_family', 'like', "%".$request->q."%")->get();
        }
        return $data;
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
     * @param  \App\Models\JobFamily  $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = JobFamily::where('id_job_family', $id)->get();
        // dd($data);
        return response()->json([
            "data" => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobFamily  $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function edit(JobFamily $jobFamily)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobFamily  $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobFamily $jobFamily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobFamily  $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobFamily $jobFamily)
    {
        //
    }
}
