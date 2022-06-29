<?php

namespace App\Http\Controllers;

use App\Models\JobFamily;
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
        return view('admin.job_family.index');
    }

    public function getJobFamily()
    {
        $data = JobFamily::all();
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
        $data = JobFamily::all();
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
                'job_family' => request('job_family')
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
    public function update(Request $request, $id)
    {
        $data = JobFamily::where('id_job_family', $id)->update([
            'kode' => request('kode'),
            'job_family' => request('job_family')
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
        return back();
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
        JobFamily::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }
}
