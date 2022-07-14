<?php

namespace App\Http\Controllers;

use App\Models\JobFamily;
use App\Models\Hasil;
use App\Models\Parameter_Penilaian;
use App\Models\BobotNilai;
use Illuminate\Http\Request;
use App\Exports\JobFamilyExport;
use App\Imports\JobFamilyImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class JobFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd($bobot);
        return view('admin.job_family.index');
    }

    public function getJobFamily()
    {
        $data = JobFamily::where('instansi_id', Auth::user()->instansi_id);
        return  DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="#editModal" data-bs-toggle="modal" data-id="' . $row->id_job_family . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm edit-btn"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';
                $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->id_job_family . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        return response()->json([
            'data' => $data
        ]);
    }
    public function getJobFamilySelect2(Request $request)
    {
        $data = JobFamily::where('instansi_id', Auth::user()->instansi_id)->get();
        if (isset($request->q)) {
            $data = JobFamily::where('job_family', 'like', "%" . $request->q . "%")->get();
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
        if ($request->ajax()) {
            JobFamily::create([
                'kode' => request('kode'),
                'job_family' => request('job_family'),
                'instansi_id' => Auth::user()->instansi_id
            ]);
            return response()->json([
                'status' => 200
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobFamily  $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = JobFamily::where('id_job_family', $id)->where('instansi_id', Auth::user()->instansi_id)->get();
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
    public function update(Request $request, $id)
    {
        $data = JobFamily::where('id_job_family', $id)->where('instansi_id', Auth::user()->instansi_id)->update([
            'kode' => request('kode'),
            'job_family' => request('job_family'),
            'instansi_id' => Auth::user()->instansi_id
        ]);
        if ($request->ajax()) {
            return response()->json(['status' => 200]);
        }
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . '_' . $file->getClientOriginalName();

        $file->move('imports', $nama_file);
        Excel::import(new JobFamilyImport, public_path('/imports/' . $nama_file));
        return back()->with('success', 'Berhasil menambahkan data');    
    }

    public function export()
    {
        return Excel::download(new JobFamilyExport, 'data_job_family.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobFamily  $jobFamily
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hasil::with('user')
            ->whereHas('user', function ($query) {
                $query->where('instansi_id', Auth::user()->instansi_id);
            })
            ->where('job_family_id', $id)->delete();

        BobotNilai::with('user', 'job_family')
            ->whereHas('user', function ($query) {
                $query->where('instansi_id', Auth::user()->instansi_id);
            })
            ->whereHas('parameter', function ($query) use ($id) {
                $query->where('job_family_id', $id);
            })->delete();
        Parameter_Penilaian::with('job_family')
            ->whereHas('job_family', function ($query) {
                $query->where('instansi_id', Auth::user()->instansi_id);
            })
            ->where('job_family_id', $id)->delete();
        JobFamily::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }
}
