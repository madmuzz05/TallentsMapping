<?php

namespace App\Http\Controllers;

use App\Models\JobFamily;
use App\Models\Parameter_Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Generator\Parameter;
use Yajra\DataTables\Facades\DataTables;

class ParameterPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.parameter.index');
    }

    function getParameter(Request $request)
    {
        $data = JobFamily::select(
            'job_family.*'
        )
            ->rightjoin('parameter_penilaian', 'parameter_penilaian.job_family_id', '=', 'job_family.id_job_family')
            ->groupBy('parameter_penilaian.job_family_id');
        // dd($data);
        if ($request->ajax()) {
            return  DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#detailModal" data-bs-toggle="modal" data-id="' . $row->id_job_family . '" class=" me-2 mb-2 btn btn-outline-light btn-sm detail-btn"><i class="fa-solid fa-circle-info"></i> Detail</a>';
                    $btn = $btn . '<a href="edit/' . $row->id_job_family . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';
                    $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->id_job_family . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response()->json(['data' => $data]);
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

        JobFamily::where('id_job_family', $request->job_family_create)->update([
            'nilai_core_faktor' => $request->core_faktor_create,
            'nilai_sec_faktor' => $request->sec_faktor_create,
        ]);

        $tema_bakat = $request->tema_bakat_create;
        $kategori_faktor = $request->kategori_faktor_create;
        $nilai = $request->nilai_create;
        $job_family = $request->job_family_create;
        for ($count = 0; $count < count($tema_bakat); $count++) {
            $data = [
                'job_family_id' => $job_family,
                'tema_bakat_id' => $tema_bakat[$count],
                'kategori_faktor'  => $kategori_faktor[$count],
                'nilai'  => $nilai[$count]
            ];
            Parameter_Penilaian::create($data);
        }

        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parameter_Penilaian  $Parameter_Penilaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Parameter_Penilaian::with('job_family', 'tema_bakat')->where('job_family_id', $id)->get();
        // dd($data);
        return response()->json([
            'data' => $data
        ]);
    }


    /**
     * It gets the data from the database and returns it to the view
     *
     * @param id The id of the job family
     */
    public function edit(Request $request, $id)
    {
        $parameter = Parameter_Penilaian::with('job_family', 'tema_bakat')->where('job_family_id', $id)->get();
        $job_family = JobFamily::where('id_job_family', $id)->get();
        // dd($job_family);
        if ($request->ajax()) {
            return response()->json([
                'parameter' => $parameter
            ]);
        }
        return view('admin.parameter.edit', compact('parameter', 'job_family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parameter_Penilaian  $Parameter_Penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameter_Penilaian $Parameter_Penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parameter_Penilaian  $Parameter_Penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parameter_Penilaian $Parameter_Penilaian)
    {
        //
    }
}
