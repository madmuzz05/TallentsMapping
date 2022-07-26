<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Jabatan;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instansi;
use App\Models\Hasil;
use App\Models\Simulasi;
use App\Models\BobotNilai;
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
        $data = User::with('unit_kerja')->where('id_user', $id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    function getUser(Request $request)
    {
        $data = User::select([
            'users.*',
            DB::raw('departemen as nama_unit'),
        ])
            ->leftjoin('unit_kerja', 'unit_kerja.id_unit_kerja', '=', 'users.unit_kerja_id')
            ->where('users.instansi_id', Auth::user()->instansi_id);
        // $data = User::with('jabatan', 'unit_kerja')->select('users.*', 'users.id_user as id_user');
        // dd($data);
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
                ->rawColumns(['action', 'unit_kerja'])
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
        $getUser = User::with('unit_kerja')->where('id_user', $id)->get();
        return view('admin.user.add', compact('getUser'));
    }
    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'nama_depan' => ['required', 'string', 'max:255'],
            'nama_belakang' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:20'],
            'instansi' => ['required', 'string', 'max:225'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $data = $request->all();
        $instansi = Instansi::updateOrCreate([
            'nama_instansi' => $data['instansi'],
        ]);
        // dd($instansi->id_instansi);

        User::create([
            'nama' => $data['nama_depan'] . ' ' . $data['nama_belakang'],
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'instansi_id' => $instansi->id_instansi,
            'hak_akses' => 'Admin',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('login');
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
            'password' => 'required|same:password_confirmation|min:6',
        ]);
        if ($validator->fails()) {
            return Response::json(array(
                'status' => 405,
                'error' => $validator->errors()->all()
            ));
        }
        $data = $request->all();
        $data['instansi_id'] = Auth::user()->instansi_id;
        $data['password'] =  Hash::make($request->password);
        User::create($data);
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
        $data = User::with('unit_kerja', 'instansi')
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
        $getUser = User::with('unit_kerja')->where('id_user', $id_admin)->get();
        $data = User::with('unit_kerja')
            ->select('users.*')->where('id_user', $id)->get();
        return view('admin.user.edit', compact('getUser', 'data'));
    }
    public function editProfil()
    {
        $id = Auth::user()->id_user;
        $data = User::with('unit_kerja')
            ->select('users.*')->where('id_user', $id)->get();
        if (Auth::user()->hak_akses == 'Admin') {
            return view('admin.user.edit_profil1', compact('data'));
        } else {
            return view('admin.user.edit_profil2', compact('data'));
        }
    }

    public function updateProfil(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $nama_file = rand() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $nama_file);
        } else {
            $nama_file = '1.png';
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_pegawai' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'unit_kerja' => 'required',
            'hak_akses' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status' => 405,
                'errors' => "Action gagal"
            ));
        }

        if ($request->password) {
            User::where('id_user', $request->id_user)
                ->update([
                    'nama' => $request->nama,
                    'no_pegawai' => $request->no_pegawai,
                    'unit_kerja_id' => $request->unit_kerja,
                    'hak_akses' => $request->hak_akses,
                    'alamat' => $request->alamat,
                    'telepon' => $request->telepon,
                    'email' => $request->email,
                    'foto' => $nama_file,
                    'password' => Hash::make($request->password),
                    'instansi_id' => Auth::user()->instansi_id,
                ]);

            return response()->json([
                'status' => 200,
                'success' => "Action Berhasil"
            ]);
        } elseif (empty($request->password)) {
            User::where('id_user', $request->id_user)
                ->update([
                    'nama' => $request->nama,
                    'no_pegawai' => $request->no_pegawai,
                    'unit_kerja_id' => $request->unit_kerja,
                    'hak_akses' => $request->hak_akses,
                    'alamat' => $request->alamat,
                    'telepon' => $request->telepon,
                    'email' => $request->email,
                    'foto' => $nama_file,
                    'instansi_id' => Auth::user()->instansi_id,
                ]);
            return response()->json([
                'status' => 200,
                'success' => "Action Berhasil"
            ]);
        }
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
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_pegawai' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'unit_kerja_id' => 'required',
            'hak_akses' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status' => 405,
                'errors' => "Action gagal"
            ));
        }
        if (request('password')) {
            User::where('id_user', request('id_user'))
                ->update([
                    'nama' => request('nama'),
                    'no_pegawai' => request('no_pegawai'),
                    'unit_kerja_id' => request('unit_kerja_id'),
                    'hak_akses' => request('hak_akses'),
                    'alamat' => request('alamat'),
                    'telepon' => request('telepon'),
                    'email' => request('email'),
                    'password' => Hash::make(request('password')),
                    'instansi_id' => Auth::user()->instansi_id,
                ]);

            return response()->json([
                'status' => 200,
                'success' => "Action Berhasil"
            ]);
        } elseif (empty(request('password'))) {
            User::where('id_user', request('id_user'))
                ->update([
                    'nama' => request('nama'),
                    'no_pegawai' => request('no_pegawai'),
                    'unit_kerja_id' => request('unit_kerja_id'),
                    'hak_akses' => request('hak_akses'),
                    'alamat' => request('alamat'),
                    'telepon' => request('telepon'),
                    'email' => request('email'),
                    'instansi_id' => Auth::user()->instansi_id,
                ]);
            return response()->json([
                'status' => 200,
                'success' => "Action Berhasil"
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
        return back()->with('success', 'Berhasil menambahkan data.');
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
        Hasil::where('user_id', $id)->delete();
        BobotNilai::where('user_id', $id)->delete();
        Simulasi::where('user_id', $id)->delete();
        return response()->json([
            'status' => 200
        ]);
    }
}
