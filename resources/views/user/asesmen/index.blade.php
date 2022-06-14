@extends('layouts.user.app')
@section('title', "Assesmen")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 xl-100 box-col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <h5>Question No. 1</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center text-bold">
                                <p><b>
                                        1. Membuat Konsep Berdasarkan Apa Yang Dilihat, Dialami Atau Diyakini.
                                    </b>
                                </p>
                            </div>
                            <div class="row animate-chk mt-4 mb-4">
                                <div class="col-lg-5">
                                </div>
                                <div class="col-lg-7 text-left">
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani"> Tidak
                                        Sesuai
                                    </label>
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani"> Kurang
                                        Sesuai
                                    </label>
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani"> Sedang
                                    </label>
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani"> Sesuai
                                    </label>
                                    <label class="d-block" for="edo-ani">
                                        <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani"> Sangat Sesuai
                                    </label>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-secondary">Previous</button>
                                    <button type="button" class="btn btn-primary m-l-20">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid Ends-->
@endsection
