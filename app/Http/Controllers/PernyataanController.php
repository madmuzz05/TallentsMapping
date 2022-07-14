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
        ])->where('pernyataan.instansi_id', Auth::user()->instansi_id)
            ->orderBy('tema_bakat', 'ASC')
            ->leftjoin('tema_bakat', 'tema_bakat.id_tema_bakat', '=', 'pernyataan.tema_bakat_id');
        // dd($data);
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

        $pernyataan = $request->pernyataan_create;
        $nilai = $request->nilai_create;
        for ($count = 0; $count < count($pernyataan); $count++) {
            $data = [
                'tema_bakat_id' => $request->tema_bakat_create,
                'pernyataan'  => $pernyataan[$count],
                'bobot_nilai'  => $nilai[$count],
                'instansi_id' => Auth::user()->instansi_id
            ];
            Pernyataan::create($data);
        }
        return response()->json([
            'status' => 200
        ]);
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
            ->select('pernyataan.*')->where('id_pernyataan', $id)->where('instansi_id', Auth::user()->instansi_id)->get();
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
    public function edit(Request $request, $id)
    {
        $data = Pernyataan::with('tema_bakat')
            ->select('pernyataan.*')->where('tema_bakat_id', $id)->where('instansi_id', Auth::user()->instansi_id)->get();
        if ($request->ajax()) {
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pernyataan  $pernyataan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tema_bakat = $request->tema_bakat_edit;
        $pernyataan = $request->pernyataan_edit;
        $nilai = $request->nilai_edit;
        $id = $request->id_pernyataan_edit;
        for ($count = 0; $count < count($tema_bakat); $count++) {
            $data = [
                'tema_bakat_id' => $tema_bakat[$count],
                'pernyataan'  => $pernyataan[$count],
                'bobot_nilai'  => $nilai[$count],
                'instansi_id' => Auth::user()->instansi_id
            ];
            Pernyataan::where('id_pernyataan', $id[$count])->update($data);
        }
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
        return back()->with('success', 'Berhasil menambahkan data');
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
        Pernyataan::where('tema_bakat_id', $id)->where('instansi_id', Auth::user()->instansi_id)->delete();
        return response()->json([
            'status' => 200
        ]);
    }
}
