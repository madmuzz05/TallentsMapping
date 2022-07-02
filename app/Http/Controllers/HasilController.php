<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\JobFamily;
use App\Models\Parameter_Penilaian;
use App\Models\Simulasi;
use App\Models\User;
use App\Http\Controllers\SimulasiController;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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

    public function hasil_pegawai(Request $request)
    {
        $rumus = (new SimulasiController)->rumus();
        // dd($rumus);
        $data = Hasil::with('user', 'job_family')->orderBy('nilai', 'desc')->get()->unique('user_id');
        // dd($data);
        if ($request->ajax()) {
            return  DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#detailModal" data-bs-toggle="modal" data-id="' . $row->user_id . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm detail-btn"><i class="fa-regular fa-pen-to-square"></i> Detail</a>';
                    $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->user_id . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            return response()->json([
                'data' => $data
            ]);
        }
        return view('admin.hasil.pegawai');
    }
    public function show_pegawai($id)
    {
        $data = Hasil::with('user', 'job_family')->where('user_id', $id)->orderBy('nilai', 'desc')->get();
        // dd($data);
        return response()->json([
            'data' => $data
        ]);
    }
    public function hasil_job_family(Request $request)
    {
        $rumus = (new SimulasiController)->rumus();
        $data = Hasil::with('user', 'job_family')->orderBy('nilai', 'desc')->get()->unique('job_family_id');
        // dd($data);
        if ($request->ajax()) {
            return  DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#detailModal" data-bs-toggle="modal" data-id="' . $row->job_family_id . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm detail-btn"><i class="fa-regular fa-pen-to-square"></i> Detail</a>';
                    $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->job_family_id . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            return response()->json([
                'data' => $data
            ]);
        }
        return view('admin.hasil.job_family');
    }
    public function show_job_family($id)
    {
        $data = Hasil::with('user', 'job_family')->where('job_family_id', $id)->orderBy('nilai', 'desc')->get();
        // dd($data);
        return response()->json([
            'data' => $data
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
    public function destroy_pegawai($id)
    {
        Hasil::where('user_id', $id)->delete();
        return response()->json([
            'status' => 200
        ]);
    }
    public function destroy_job_family($id)
    {
        Hasil::where('job_family_id', $id)->delete();
        JobFamily::where('id_job_family', $id)->update([
            'nilai_core_faktor' => '0',
            'nilai_sec_faktor' => '0',
        ]);
        return response()->json([
            'status' => 200
        ]);
    }
}
