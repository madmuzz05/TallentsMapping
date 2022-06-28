@extends('layouts.user.app')
@section('title', "Assesmen")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="/simulasi/store" method="post">
                            @csrf
                            <div class="col-lg-12 mb-2">
                                <h5>Question No. {{ Session::get("next") }}</h5>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center text-bold">
                                    <p><b>
                                            {{ Session::get("next") }}. {{ $data->pernyataan }}
                                        </b>
                                    </p>
                                </div>
                                <div class="row animate-chk mt-4 mb-4">
                                    <div class="col-lg-5">
                                    </div>
                                    <div class="col-lg-7 text-left">
                                        <input type="hidden" name="id_pernyataan" value="{{ $data->id_pernyataan }}">
                                        <input type="hidden" name="id_tema_bakat" value="{{ $data->tema_bakat_id }}">
                                        <input class="radio_animated" id="0" type="radio" value="0" checked name="ans"
                                            hidden>
                                        @forelse($answer as $o)
                                        <!-- <input type="text" name="test" value="{{$o->nilai}}" id=""> -->
                                        <label class="d-block" for="a">
                                            <input class="radio_animated" id="a" type="radio" value="1"
                                                {{ ($o->nilai == '1')? 'checked' : ''}} name="ans"> Tidak
                                            Sesuai
                                        </label>
                                        <label class="d-block" for="b">
                                            <input class="radio_animated" id="b" type="radio" value="2" name="ans"
                                                {{ ($o->nilai == '2')? 'checked' : ''}}> Kurang
                                            Sesuai
                                        </label>
                                        <label class="d-block" for="c">
                                            <input class="radio_animated" id="c" type="radio" value="3"
                                                {{ ($o->nilai == '3')? 'checked' : ''}} name="ans"> Sedang
                                        </label>
                                        <label class="d-block" for="d">
                                            <input class="radio_animated" id="d" type="radio" value="4"
                                                {{ ($o->nilai == '4')? 'checked' : ''}} name="ans"> Sesuai
                                        </label>
                                        <label class="d-block" for="e">
                                            <input class="radio_animated" id="e" type="radio" value="5"
                                                {{ ($o->nilai == '5')? 'checked' : ''}} name="ans"> Sangat Sesuai
                                        </label>
                                        @empty
                                        <input class="radio_animated" id="0" type="radio" value="0" checked name="ans"
                                            hidden>
                                        <label class="d-block" for="a">
                                            <input class="radio_animated" id="a" type="radio" value="1" name="ans">
                                            Tidak
                                            Sesuai
                                        </label>
                                        <label class="d-block" for="b">
                                            <input class="radio_animated" id="b" type="radio" value="2" name="ans">
                                            Kurang
                                            Sesuai
                                        </label>
                                        <label class="d-block" for="c">
                                            <input class="radio_animated" id="c" type="radio" value="3" name="ans">
                                            Sedang
                                        </label>
                                        <label class="d-block" for="d">
                                            <input class="radio_animated" id="d" type="radio" value="4" name="ans">
                                            Sesuai
                                        </label>
                                        <label class="d-block" for="e">
                                            <input class="radio_animated" id="e" type="radio" value="5" name="ans">
                                            Sangat Sesuai
                                        </label>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary btn_submit m-l-20">Next</button>
                        </form>
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
@push('js')
<script>
    $(document).ready(function () {
        $('form').submit(function () {
            $('.btn_submit', this).attr('disabled', 'disabled');
        });
    })
</script>
@endpush
