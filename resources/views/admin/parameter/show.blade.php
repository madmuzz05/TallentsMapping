@extends('layouts.admin.app')
@section('title', "Parameter Penilaian Assesmen")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Detail Parameter Penilaian Assesmen</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Assesmen</li>
                    <li class="breadcrumb-item"><a href="{{route('parameter.index')}}">Parameter Penilaian Assesmen</a>
                    </li>
                    <li class="breadcrumb-item active">Parameter Penilaian Assesmen</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @foreach ($job_family as $item)
                            <form method="post" id="create_form">
                                <input type="hidden" id="id_job_family" name="id_job_family" value="{{$item->id_job_family}}">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Job Family</label>
                                    <div class="col-sm-9">
                                    <input class="form-control job_family" type="text" name="job_family_edit[]" value="{{$item->job_family}}" id="_family_edit" readonly required/>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Presentase Core Faktor</label>
                                    <div class="col-sm-9">
                                        <div class="input-group"><input class="form-control digits core_faktor"
                                                type="number" name="core_faktor_edit" id="core_faktor_edit"
                                                placeholder="Input nilai dalam bentuk angka"
                                                aria-label="Recipient's username" min="0" max="100" readonly required
                                                value="{{$item->nilai_core_faktor}}" /><span class="input-group-text"><i
                                                    data-feather="percent"></i></span></div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Presentase Secondary Faktor</label>
                                    <div class="col-sm-9">
                                        <div class="input-group"><input class="form-control digits sec_faktor"
                                                type="number" name="sec_faktor_edit" id="sec_faktor_edit"
                                                placeholder="Input nilai dalam bentuk angka"
                                                aria-label="Recipient's username" min="0" max="100" readonly required
                                                value="{{$item->nilai_sec_faktor}}" /><span class="input-group-text"><i
                                                    data-feather="percent"></i></span></div>
                                    </div>
                                </div>
                                <div class="row mr-5 ml-5">
                                    <div class="col-lg-12 table-responsive-lg text-center">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>Tema Bakat</td>
                                                    <td>Faktor Penilaian</td>
                                                    <td>Nilai GAP</td>
                                                            
                                                </tr>
                                            </thead>
                                            <tbody class="body_edit">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                        </form>
                        @endforeach
                        <a href="/parameter/index" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function () {


        var id_modal_edit = document.getElementById('id_job_family').value
        $.ajax({
            type: "GET",
            url: '/parameter/show/' + id_modal_edit,
            cache: false,
            success: function (res) {
                // console.log(res.parameter);
                var html_edit = ''
                $.each(res.parameter, function (key, item) {
                    html_edit = '<tr>'
                    html_edit +=
                        '<td><select class="tema_bakat_select2 col-sm-12 tema_bakat tema_option" name="tema_bakat_create[]" disabled id="tema_bakat_create" required>'
                    html_edit += '<option value="' + item.tema_bakat.id_tema_bakat + '">' +
                        item.tema_bakat.nama_tema + '</option></select></td>'

                    html_edit +=
                        '<td><select class="js-example-basic-single col-sm-12 kategori_faktor kategori_option" name="kategori_faktor_create[]" disabled id="kategori_faktor_create" required>'
                    html_edit += '<option value="' + item.kategori_faktor + '">' + item
                        .kategori_faktor + '</option>'

                    html_edit +=
                        '<option value="Core Faktor">Core Faktor</option>'
                    html_edit +=
                        '<option value="Secondary Faktor">Secondary Faktor</option>'
                    html_edit += '</select></td>'
                    html_edit +=
                        '<td><input class="form-control digits nilai" type="number" name="nilai_create[]" disabled value="' +
                        item.nilai +
                        '" id="nilai_create" placeholder="Input nilai dalam bentuk angka" min="1" max="5" required/></td>'
                    
                        html_edit += '<input type="hidden" id="id_parameter" name="id_parameter[]" value="'+item.id_parameter_penilaian+'">'
                    html_edit += '</tr>'
                    

                    $('.body_edit').append(html_edit);
                    $('.tema_bakat_select2').select2({
                            placeholder: 'Select Data',
                            allowClear: true,
                            minimumInputLength: 0,
                            ajax: {
                                dataType: "json",
                                method: 'POST',
                                url: "{{route('tema_bakat.getTemaBakatSelect2')}}",
                                processResults: function (data) {
                                    return {
                                        results: data.map(function (
                                            item) {
                                            item.id = item
                                                .id_tema_bakat;
                                            item.text = item
                                                .nama_tema;
                                            return item;
                                        })
                                    };
                                },
                            },
                            escapeMarkup: function (m) {
                                return m;
                            }
                        }).on('select2:select', function (e) {});

                        $('.js-example-basic-single').select2({
                            placeholder: 'Select an option',
                            allowClear: true,
                        });

                })
            }
        })
    });

</script>
@endpush
