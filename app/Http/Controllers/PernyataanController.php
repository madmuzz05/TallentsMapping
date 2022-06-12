<?php

namespace App\Http\Controllers;

use App\Exports\PernyataanExport;
use App\Imports\PernyataanImport;
use App\Models\Pernyataan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PernyataanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pernyataan.index');
    }

    function getPernyataan(Request $request)
    {
        $data = Pernyataan::select([
            'pernyataan.*',
            DB::raw('nama_tema as tema_bakat'),
            DB::raw('id_tema_bakat as id_tema')
        ])
            ->leftjoin('tema_bakat', 'tema_bakat.id_tema_bakat', '=', 'pernyataan.tema_bakat_id');
        if ($request->ajax()) {
            return  DataTables::of($data)
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    if ($request->has('pernyataan')) {
                        $query->where('pernyataan.pernyataan', 'like', "%{$request->get('pernyataan')}%");
                    }
                    if (!empty($request->get('nama_tema'))) {
                        $query->where('pernyataan.tema_bakat_id', $request->get('nama_tema'));
                    }
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#detailModal" data-bs-toggle="modal" data-id="' . $row->id_pernyataan . '" class=" me-2 mb-2 btn btn-outline-light btn-sm detail-btn"><i class="fa-solid fa-circle-info"></i> Detail</a>';
                    $btn = $btn . '<a href="#editModal" data-bs-toggle="modal" data-id="' . $row->id_pernyataan . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm edit-btn"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';
                    $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->id_pernyataan . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';

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
        if ($request->ajax()) {
            Pernyataan::create([
                'pernyataan' => request('pernyataan'),
                'tema_bakat_id' => request('tema_bakat_id')
            ]);
            return response()->json([
                'status' => 200
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = Pernyataan::with('tema_bakat')
            ->select('pernyataan.*')->where('id_pernyataan', $id)->get();
        if ($request->ajax()) {
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pernyataan $pernyataan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Pernyataan::where('id_pernyataan', $id)->update([
            'pernyataan' => request('pernyataan'),
            'tema_bakat_id' => request('tema_bakat_id')
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
        Excel::import(new PernyataanImport, public_path('/imports/' . $nama_file));
        return back();
    }

    public function export()
    {
        return Excel::download(new PernyataanExport, 'data_pernyataan.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pernyataan::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }
}
