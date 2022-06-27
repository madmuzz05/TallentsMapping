@extends('layouts.user.app')
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
@foreach($getUser as $user)
@if($user->assesmen == 'N')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <h5>ASSESMEN TALENTS MAPPING</h5>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <p>Modul ini berisikan beberapa materi asesmen guna mengukur diri secara personal.
                                    Banyak manfaat yang dapat diperoleh dengan mengerjakan asesmen-asemen di dalamnya,
                                    selain mengusung konsep Right People on the Right Place juga memberikan masukkan
                                    kepada seseorang tentang dirinya dan potensi kesuksesan yang akan diraihnya melalui
                                    pengenalan diri berbasis BAKAT dan Potensi KEKUATAN Silahkan mengerjakan dengan
                                    sebaik-baiknya sesuai
                                    dengan pemahaman atas diri masing-masing. Yakinlah bahwa Anda-lah yang lebih
                                    mengenal
                                    tentang diri Anda, dan kami berusaha membantu Anda untuk lebih memahami tentang diri
                                    Anda
                                    melalui serangkaian materi asesmen di dalamnya.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#introModal">Mulai Assesmen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif($user->assesmen == 'Y')
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
                    <h5>Pie Chart</h5>
                </div>
                <div class="card-body p-0 chart-block">
                    <div class="chart-overflow" id="chart-user3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('hasil')
<a class="nav-link menu-title {{  request()->is('hasil') ? 'active' : '' }}"
    href="javascript:void(0)"><i data-feather="home"></i><span>Beranda</span></a>
<ul class="nav-submenu menu-content" style="display: none;">
    <li><a href="{{route('index')}}"
            class="{{ request()->routeIs('index') ? 'active' : ''}}">Dashboard</a>
    </li>
</ul>
@stop
@endif
@endforeach
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <h5>ASSESMEN TALENTS MAPPING</h5>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center">
                                <p>Modul ini berisikan beberapa materi asesmen guna mengukur diri secara personal.
                                    Banyak manfaat yang dapat diperoleh dengan mengerjakan asesmen-asemen di dalamnya,
                                    selain mengusung konsep Right People on the Right Place juga memberikan masukkan
                                    kepada seseorang tentang dirinya dan potensi kesuksesan yang akan diraihnya melalui
                                    pengenalan diri berbasis BAKAT dan Potensi KEKUATAN Silahkan mengerjakan dengan
                                    sebaik-baiknya sesuai
                                    dengan pemahaman atas diri masing-masing. Yakinlah bahwa Anda-lah yang lebih
                                    mengenal
                                    tentang diri Anda, dan kami berusaha membantu Anda untuk lebih memahami tentang diri
                                    Anda
                                    melalui serangkaian materi asesmen di dalamnya.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#introModal">Mulai Assesmen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<!-- Intro Modal -->
<div class="modal fade" id="introModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Petunjuk Mengerjakan Asesmen</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-left">
                        <ul class="point_ul">
                            <li>
                                Waktu Normal yang dibutuhkan untuk menjawab kuesioner ini (114 pernyataan) adalah 30 s/d
                                40 menit.
                            </li>
                            <li>
                                Hasil akurat dan mewakili keadaan yang sebenarnya apabila :
                            </li>
                            <ul class="point_ul">
                                <li>
                                    Jawaban yang dipilih adalah jawaban yang pertama kali melintas dalam pikiran anda
                                </li>
                            </ul>
                            <li>Jawablah dengan SPONTAN, tanpa perlu menganalisa, memahami terlalu dalam, atau menduga
                                arah pertanyaan, dengan demikian unsur spontanitas dapat terjaga.
                            </li>
                            <li>Asesmen ini BUKANLAH sebuah TES, karena tidak ada jawaban yang tergolong "BENAR" atau
                                "SALAH". Apapun yang Anda pilih hendaknya merupakan suatu penggambaran dari hal-hal yang
                                "Anda lakukan" atau "Perasaan anda".
                            </li>
                            <li>Jika anda telah siap, silahkan klik tombol START untuk memulai.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('simulasi.index') }}" class="btn btn-primary">START</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro Modal end -->
@endsection
