<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id_user;
        $getUser = User::with('jabatan', 'unit_kerja')->where('id_user', $id)->get();
        return view('admin.user.index', compact('getUser'));
    }

    function getUser(Request $request)
    {
        $data = User::with('jabatan', 'unit_kerja')->select('users.*', 'users.id_user as id_user');
        return  DataTables::of($data)
            ->filter(function ($query) use ($request) {
                if ($request->has('nama')) {
                    $query->where('users.nama', 'like', "%{$request->get('nama')}%");
                }

                if ($request->has('email')) {
                    $query->where('users.email', 'like', "%{$request->get('email')}%");
                }
            })
            ->addColumn('action', function ($row) {

                $btn = '<a href="#myModal" data-bs-toggle="modal" data-id="' . $row->id_user . '" class=" me-2 mb-2 btn btn-outline-light btn-sm detail-btn"><i class="fa-solid fa-circle-info"></i> Detail</a>';
                $btn = $btn . '<input type="hidden" id="id_user" value="' . $row->id_user . '">';
                $btn = $btn . '<a href="javascript:void(0)" class="me-2 mb-2 btn btn-outline-secondary btn-sm"><i class="fa-regular fa-pen-to-square"></i> Edit</a>';
                $btn = $btn . '<a href="javascript:void(0)" class="me-2 mb-2 btn btn-outline-danger btn-sm"><i class="fa-regular fa-trash-can"></i> Delete</a>';

                return $btn;
            })
            ->rawColumns(['action', 'Jabatan', 'unit_kerja'])
            ->make(true);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $id_admin = Auth::user()->id_user;
        $getUser = User::with('jabatan', 'unit_kerja')->where('id_user', $id_admin)->get();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
