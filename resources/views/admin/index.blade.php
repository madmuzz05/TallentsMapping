@extends('layouts.admin.app')
@section('title', "Dashboard")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Dashboard</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Beranda</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-xl-4 col-lg-6">
            <div class="card o-hidden border-0">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="users"></i></div>
                        <div class="media-body">
                            <span class="m-0">Total User</span>
                            <h4 class="mb-0 counter">{{$getUser}}</h4>
                            <i class="icon-bg" data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4 col-lg-6">
            <div class="card o-hidden border-0">
                <div class="bg-secondary b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="check-square"></i></div>
                        <div class="media-body">
                            <span class="m-0">Sudah Assesmen</span>
                            <h4 class="mb-0 counter">{{$sudah}}</h4>
                            <i class="icon-bg" data-feather="check-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4 col-lg-6">
            <div class="card o-hidden border-0">
                <div class="bg-primary b-r-4 card-body">
                    <div class="media static-top-widget">
                        <div class="align-self-center text-center"><i data-feather="x-square"></i></div>
                        <div class="media-body">
                            <span class="m-0">Belum Assesmen</span>
                            <h4 class="mb-0 counter">{{$belum}}</h4>
                            <i class="icon-bg" data-feather="x-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ui-sortable" id="draggableMultiple">
            <div class="col col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h6>Jumlah rekomendasi user</h6>
                    </div>
                    <div class="card-body p-2 chart-block">
                        <div class="chart-overflow" id="potensi-kekuatan"></div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h6>User yang mengikuti Assesmen </h6>
                    </div>
                    <div class="card-body p-2 chart-block">
                        <div class="chart-overflow" id="potensi-kelemahan"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ui-sortable" id="draggableMultiple">
            <div class="col col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Rekomendasi Hasil Assesmen By Job Family </h6>
                    </div>
                    <div class="card-body p-10 chart-block">
                        <table class="table table-bordered text-center table_hasil_admin">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Job Family</th>
                                    <th>Rekomendasi User</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($byJob as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->job_family->job_family}}</td>
                                    <td>{{$d->user->nama}}</td>
                                    <td>{{$d->nilai}}</td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h6>Rekomendasi Hasil Assesmen By User </h6>
                    </div>
                    <div class="card-body p-10 chart-block">
                    <table class="table table-bordered text-center table_hasil_admin">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Job Family</th>
                                    <th>Nilai</th>
                                    <!-- <th>Departemen</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($byUsers as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->user->nama}}</td>
                                    <td>{{$d->job_family->job_family}}</td>
                                    <td>{{$d->nilai}}</td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid Ends-->
@endsection
