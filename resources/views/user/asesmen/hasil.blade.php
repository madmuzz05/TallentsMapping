@extends('layouts.user.app')
@section('title', "Assesmen")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Hasil Assesmen</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Assesmen</li>
                    <li class="breadcrumb-item active">Hasil Assesmen</li>
                </ol>
            </div>
            <div class="col-lg-6">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row ui-sortable" id="draggableMultiple">
        <div class="col col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Potensi Kekuatan</h5>
                </div>
                <div class="card-body p-0 chart-block">
                    <div class="chart-overflow" id="potensi-kekuatan"></div>
                </div>
            </div>
        </div>
        <div class="col col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Potensi Kelemahan</h5>
                </div>
                <div class="card-body p-0 chart-block">
                    <div class="chart-overflow" id="potensi-kelemahan"></div>
                </div>
            </div>
        </div>
        <div class="col col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Rekomendasi Unit Kerja</h5>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center table_hasil">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Job Family</th>
                                    <th>Nilai</th>
                                    <!-- <th>Departemen</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->job_family->job_family}}</td>
                                    <td>{{$d->nilai}}</td>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Potensi Kekuatan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($kekuatan as $kuat)
                        <div class="col-lg-12">
                            <h6>{{$loop->iteration}}. {{$kuat->nama_tema}}</h6>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-lg-12 text-left">
                                <p>{{$kuat->deskripsi}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Potensi Kelemahan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($kelemahan as $lemah)
                        <div class="col-lg-12">
                            <h6>{{$loop->iteration}}. {{$lemah->nama_tema}}</h6>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-lg-12 text-left">
                                <p>{{$lemah->deskripsi}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid Ends-->
@endsection

