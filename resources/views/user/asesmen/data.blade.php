@foreach ($data as $item)
                        <div class="col-lg-12 mb-2">
                            <h5>Question No. {{ $data->currentPage() }}</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center text-bold">
                                <p><b>
                                        {{ $data->currentPage() }}. {{ $item->pernyataan }}
                                    </b>
                                </p>
                            </div>
                            <div class="row animate-chk mt-4 mb-4">
                                <div class="col-lg-5">
                                </div>
                                <div class="col-lg-6 m-l-35 text-left">
                                    <input type="hidden" name="currentPage" value="{{$data->currentPage()}}">
                                    <input type="hidden" name="id_pernyataan" value="{{ $item->id_pernyataan }}">
                                    <input type="hidden" name="id_tema_bakat" value="{{ $item->tema_bakat_id }}">
                                    @endforeach
                                    @forelse($answer as $o)
                                    <!-- <input type="text" name="test" value="{{$o->nilai}}" id=""> -->
                                    <label class="d-block" for="0">
                                        <input class="radio_animated" id="0" type="radio" value="0"
                                            {{ ($o->nilai == '0')? 'checked' : ''}} name="ans"> Tidak
                                        Relevan
                                    </label>
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

                                    <label class="d-block" for="0">
                                        <input class="radio_animated" id="0" type="radio" value="0" name="ans">
                                        Tidak
                                        Relevan
                                    </label>
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
                                <div class="pagination justify-content-center pagination-primary m-b-20">
                                    {{$data->links()}}
                                </div>
                                @if($tanyaan == $total)
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary btn_submit">Next</button>
                                </div>
                                @endif
                            </div>
                        </div>
