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
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 xl-100 box-col-12">
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
                                    <a href="#" class="btn btn-primary">Mulai Assesmen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-lg-4 box-col-4">
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
        <div class="col col-lg-4 box-col-4">
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

<!-- Container-fluid Ends-->
@endsection
