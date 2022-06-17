<?php

namespace App\Http\Controllers;

use App\Exports\UnitKerjaExport;
use App\Imports\UnitKerjaImport;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

use Maatwebsite\Excel\Facades\Excel;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.unit_kerja.index');
    }
    function getUnitKerja(Request $request)
    {
        $data = UnitKerja::select(
            'unit_kerja.*',
            DB::raw('kode as kode'), 
            DB::raw('job_family as job_family') )
            ->leftjoin('job_family', 'job_family.id_job_family', '=', 'unit_kerja.job_family_id');
        // dd($data);
        if ($request->ajax()) {
            return  DataTables::of($data)
                ->addIndexColumn()
                ->filter(function ($query) use ($request)
                {
                    if (!empty($request->get('job_family'))) {
                        $query->where('unit_kerja.job_family_id', 'like', "%{$request->get('job_family')}%");
                    }
                    if (!empty($request->get('departemen'))) {
                        $query->where('unit_kerja.id_unit_kerja', 'like', "%{$request->get('departemen')}%");
                    }
                }
                )
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#editModal" data-bs-toggle="modal" data-id="' . $row->id_unit_kerja . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm edit-btn"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';
                    $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->id_unit_kerja . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response()->json(['data' => $data]);
    }
    function getUnitKerjaSelect2(Request $request)
    {
        $data = UnitKerja::all();
        if (isset($request->q)) {
            $data = UnitKerja::where('departemen', 'like', "%".$request->q."%")->get();
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
            UnitKerja::create([
                'job_family_id' => request('job_family_id'),
                'departemen' => request('departemen')
            ]);
            return response()->json([
                'status' => 200
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = UnitKerja::select(
            '*',
            DB::raw('kode as kode'), 
            DB::raw('job_family as job_family') )
            ->leftjoin('job_family', 'job_family.id_job_family', '=', 'unit_kerja.job_family_id')->where('id_unit_kerja', $id)->get();
        if ($request->ajax()) {
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitKerja $unitKerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        UnitKerja::where('id_unit_kerja', $id)
            ->update([ 
                'job_family_id' => request('job_family_id'),
                'departemen' => request('departemen')]);
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
        Excel::import(new UnitKerjaImport, public_path('/imports/' . $nama_file));
        return back();
    }

    public function export()
    {
        return Excel::download(new UnitKerjaExport, 'data_unit_kerja.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitKerja  $unitKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UnitKerja::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }
}
