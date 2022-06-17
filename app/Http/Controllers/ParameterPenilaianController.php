<?php

namespace App\Http\Controllers;

use App\Models\Parameter_Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
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
        $data = Parameter_Penilaian::select(
            'parameter_penilaian.*',
            DB::raw('job_family as job_family'),
            DB::raw('nilai_core_faktor as core_faktor'), 
            DB::raw('nilai_sec_faktor as sec_faktor'),
            DB::raw('nama_tema as nama_tema')
            )
            ->leftjoin('job_family', 'job_family.id_job_family', '=', 'parameter_penilaian.job_family_id')
            ->leftjoin('tema_bakat', 'tema_bakat.id_tema_bakat', '=', 'parameter_penilaian.tema_bakat_id');
        // dd($data);
        if ($request->ajax()) {
            return  DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#detailModal" data-bs-toggle="modal" data-id="' . $row->id_parameter_penilaian . '" class=" me-2 mb-2 btn btn-outline-light btn-sm detail-btn"><i class="fa-solid fa-circle-info"></i> Detail</a>';
                    $btn = $btn . '<a href="#editModal" data-bs-toggle="modal" data-id="' . $row->id_parameter_penilaian . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm edit-btn"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';
                    $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->id_parameter_penilaian . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParameterPernilaian  $parameterPernilaian
     * @return \Illuminate\Http\Response
     */
    public function show(ParameterPernilaian $parameterPernilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParameterPernilaian  $parameterPernilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(ParameterPernilaian $parameterPernilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParameterPernilaian  $parameterPernilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParameterPernilaian $parameterPernilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParameterPernilaian  $parameterPernilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParameterPernilaian $parameterPernilaian)
    {
        //
    }
}
