<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Jabatan;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    function getUserLogin()
    {
        $id = Auth::user()->id_user;
        $data = User::with('jabatan', 'unit_kerja')->where('id_user', $id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    function getUser(Request $request)
    {
        $data = User::select([
            'users.*',
            DB::raw('nama_unit_kerja as nama_unit'),
            DB::raw('kategori_jabatan as jabatan'),
        ])
            ->leftjoin('unit_kerja', 'unit_kerja.id_unit_kerja', '=', 'users.unit_kerja_id')
            ->leftjoin('jabatan', 'jabatan.id_jabatan', '=', 'users.jabatan_id');
        // $data = User::with('jabatan', 'unit_kerja')->select('users.*', 'users.id_user as id_user');
        if ($request->ajax()) {
            return  DataTables::of($data)
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    if ($request->has('nama')) {
                        $query->where('users.nama', 'like', "%{$request->get('nama')}%");
                    }

                    if ($request->has('email')) {
                        $query->where('users.email', 'like', "%{$request->get('email')}%");
                    }
                    if (!empty($request->get('unit_kerja'))) {
                        $query->where('users.unit_kerja_id', $request->get('unit_kerja'));
                    }
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="#detailModal" data-bs-toggle="modal" data-id="' . $row->id_user . '" class=" me-2 mb-2 btn btn-outline-light btn-sm detail-btn"><i class="fa-solid fa-circle-info"></i> Detail</a>';
                    $btn = $btn . '<a href="edit/' . $row->id_user . '" class="me-2 mb-2 btn btn-outline-secondary btn-sm"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';
                    $btn = $btn . '<a href="#deleteModal" data-bs-toggle="modal" data-id="' . $row->id_user . '" class="me-2 mb-2 btn btn-outline-danger btn-sm delete-btn"><i class="fa-regular fa-trash-can"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'Jabatan', 'unit_kerja'])
                ->make(true);
        }
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
        $id = Auth::user()->id_user;
        $getUser = User::with('jabatan', 'unit_kerja')->where('id_user', $id)->get();
        return view('admin.user.add', compact('getUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_pegawai' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->errors()->all()
            ));
        }
        User::create($request->all());
        return response()->json([
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data = User::with('jabatan', 'unit_kerja')
            ->select('users.*')->where('id_user', $id)->get();
        if ($request->ajax()) {
            return response()->json(['data' => $data]);
        }
        // dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_admin = Auth::user()->id_user;
        $getUser = User::with('jabatan', 'unit_kerja')->where('id_user', $id_admin)->get();
        $data = User::with('jabatan', 'unit_kerja')
            ->select('users.*')->where('id_user', $id)->get();
        return view('admin.user.edit', compact('getUser', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if (request('password')) {
            User::where('id_user', request('id_user'))
                ->update([
                    'nama' => request('nama'),
                    'no_pegawai' => request('no_pegawai'),
                    'jabatan_id' => request('jabatan_id'),
                    'unit_kerja_id' => request('unit_kerja_id'),
                    'hak_akses' => request('hak_akses'),
                    'alamat' => request('alamat'),
                    'telepon' => request('telepon'),
                    'email' => request('email'),
                    'password' => Hash::make(request('password')),
                ]);

            return response()->json([
                'status' => 200
            ]);
        } elseif (empty(request('password'))) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'no_pegawai' => 'required',
                'alamat' => 'required',
                'telepon' => 'required',
                'email' => 'required',
            ]);

            if ($validator->fails()) {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->errors()->all()
                ));
            }
            User::where('id_user', request('id_user'))
                ->update([
                    'nama' => request('nama'),
                    'no_pegawai' => request('no_pegawai'),
                    'jabatan_id' => request('jabatan_id'),
                    'unit_kerja_id' => request('unit_kerja_id'),
                    'hak_akses' => request('hak_akses'),
                    'alamat' => request('alamat'),
                    'telepon' => request('telepon'),
                    'email' => request('email'),
                ]);
            return response()->json([
                'status' => 200
            ]);
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
        Excel::import(new UsersImport, public_path('/imports/' . $nama_file));
        return back();
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'data_user.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json([
            'status' => 200
        ]);
    }
}
