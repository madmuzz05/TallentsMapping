<?php

namespace App\Http\Controllers;

use App\Exports\TemaBakatExport;
use App\Imports\TemaBakatImport;
use App\Models\TemaBakat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class TemaBakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.tema_bakat.index');
    }

    function getTemaBakat(Request $request)
    {
        $data = TemaBakat::where('instansi_id', Auth::user()->instansi_id)->orderBy('nama_tema', 'ASC')->get();
        if ($request->ajax()) {
            return  DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#detailModal" data-bs-toggle="modal" data-id="' . $row->id_tema_bakat . '" class=" me-2 mb-2 btn btn-outline-light btn-sm detail-btn"><i class="fa-solid fa-circle-info"></i> Detail</a>';
                    $btn = $btn . '<a href="#editModal" data-bs-toggle="modal" data-id="' . $row->id_tema_bakat . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm edit-btn"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';
                    $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->id_tema_bakat . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response()->json(['data' => $data]);
    }
    function getTemaBakatSelect2(Request $request)
    {
        $data = TemaBakat::where('instansi_id', Auth::user()->instansi_id)->orderBy('nama_tema', 'asc')->get();
        if (isset($request->q)) {
            $data = TemaBakat::where('nama_tema', 'like', "%" . $request->q . "%")->get();
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
            TemaBakat::create([
                'nama_tema' => request('nama_tema'),
                'deskripsi' => request('deskripsi'),
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
     * @param  \App\Models\TemaBakat  $temaBakat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = TemaBakat::where('id_tema_bakat', $id)->where('instansi_id', Auth::user()->instansi_id)->get();
        if ($request->ajax()) {
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemaBakat  $temaBakat
     * @return \Illuminate\Http\Response
     */
    public function edit(TemaBakat $temaBakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TemaBakat  $temaBakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = TemaBakat::where('id_tema_bakat', $id)->where('instansi_id', Auth::user()->instansi_id)->update([
            'nama_tema' => request('nama_tema'),
            'deskripsi' => request('deskripsi'),
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
        Excel::import(new TemaBakatImport, public_path('/imports/' . $nama_file));
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function export()
    {
        return Excel::download(new TemaBakatExport, 'data_tema_bakat.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemaBakat  $temaBakat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TemaBakat::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }
}
