@extends('layouts.admin.app')
@section('title', "Paramater Penilaian")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Parameter Penilaian Assesmen</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Assesmen</li>
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
                <div class="card-header m-b-0 p-b-0">
                    <div class="m-b-0 col-sm-12 text-end">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#createModal"
                            class="btn btn-success mb-2">Create Data</button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3 mb-5 mr-3 ml-3">
                        <table class="table table-bordered text-center " id="parameter_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Job Family</th>
                                    <th>Nilai Core Faktor</th>
                                    <th>Nilai secondary Faktor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Job Family</th>
                                    <th>Nilai Core Faktor</th>
                                    <th>Nilai secondary Faktor</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfimasi</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="bodi_hapus"></p>
                <input type="hidden" class="id_parameter_del" id="id_parameter_del" name="id_parameter_del" value="">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="konfirmasi-del" type="button">Ya</button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<!-- Create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Parameter Penilaian Assesmen</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="create_form">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Job Family</label>
                        <div class="col-sm-9">
                            <select class="job_family_select2 col-sm-12 job_family" name="job_family_create"
                                id="job_family_create">
                            </select>
                            <a class="example-popover btn btn-primary" tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Presentase Core Faktor</label>
                        <div class="col-sm-9">
                            <div class="input-group"><input class="form-control digits core_faktor" type="number"
                                    name="core_faktor_create" id="core_faktor_create"
                                    placeholder="Input nilai dalam bentuk angka" aria-label="Recipient's username"
                                    min="0" max="100"/><span class="input-group-text"><i
                                        data-feather="percent"></i></span></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Presentase Secondary Faktor</label>
                        <div class="col-sm-9">
                            <div class="input-group"><input class="form-control digits sec_faktor" type="number"
                                    name="sec_faktor_create" id="sec_faktor_create"
                                    placeholder="Input nilai dalam bentuk angka" aria-label="Recipient's username"
                                    min="0" max="100"/><span class="input-group-text"><i
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
                                        <td><button type="button" class="btn btn-sm btn-info" id="add">Add
                                                Field</button></td>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <tr>
                                        <td><select class="tema_bakat_select2 col-sm-12 tema_bakat"
                                                name="tema_bakat_create[]" id="tema_bakat_create"></select>
                                        </td>
                                        <td><select class="js-example-basic-single col-sm-12 kategori_faktor"
                                                name="kategori_faktor_create[]" id="kategori_faktor_create">
                                                <option value=""></option>
                                                <option value="Core Faktor">Core Faktor</option>
                                                <option value="Secondary Faktor">Secondary Faktor</option>
                                            </select></td>
                                        <td><input class="form-control digits nilai" type="number" name="nilai_create[]"
                                                id="nilai_create" placeholder="Input nilai dalam bentuk angka" min="1"
                                                max="5"/></td>
                                        <td><button type="button" class="btn btn-sm btn-danger remove">Delete
                                                Field</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="create-data" type="submit">Simpan</button>
                </form>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Parameter Penilaian Assesmen</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="create_form">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Job Family</label>
                        <div class="col-sm-9">
                            <select class="job_family_select2 col-sm-12 job_family add_option" name="job_family_edit"
                                id="job_family_edit" required>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Presentase Core Faktor</label>
                        <div class="col-sm-9">
                            <div class="input-group"><input class="form-control digits core_faktor" type="number"
                                    name="core_faktor_edit" id="core_faktor_edit"
                                    placeholder="Input nilai dalam bentuk angka" aria-label="Recipient's username"
                                    min="0" max="100" required /><span class="input-group-text"><i
                                        data-feather="percent"></i></span></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Presentase Secondary Faktor</label>
                        <div class="col-sm-9">
                            <div class="input-group"><input class="form-control digits sec_faktor" type="number"
                                    name="sec_faktor_edit" id="sec_faktor_edit"
                                    placeholder="Input nilai dalam bentuk angka" aria-label="Recipient's username"
                                    min="0" max="100" required /><span class="input-group-text"><i
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
                                        <td><button type="button" class="btn btn-sm btn-info" id="add">Add
                                                Field</button></td>
                                    </tr>
                                </thead>
                                <tbody class="body_edit">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="create-data" type="submit">Simpan</button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<!-- detail modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Pernyataan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Pernyataan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control pernyataan" id="pernyataan_detail" rows="3"
                                name="pernyataan_detail" readonly></textarea>
                        </div>
                    </div>
                    <label class="col-sm-3 col-form-label">Tema Bakat</label>
                    <div class="col-sm-9">
                        <input class="form-control tema_bakat" type="text" name="tema_bakat_detail"
                            id="tema_bakat_detail" value="" readonly />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="edit-data" type="button">Simpan</button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
@endsection
@push('js')
<script>
    $(document).ready(function () {
        var table = $('#parameter_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('parameter.getParameter') }}"
                // data: function (d) {
                //     d.pernyataan = $('input[name=pernyataan]').val();
                //     d.nama_tema = $('.tema_bakat_select2').val();
                //     return d;
                // }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'job_family',
                    name: 'job_family'
                },
                {
                    data: 'nilai_core_faktor',
                    name: 'nilai_core_faktor'
                },
                {
                    data: 'nilai_sec_faktor',
                    name: 'nilai_sec_faktor'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        })


        var html = '';

        function create_field() {
            html = '<tr>'
            html +=
                '<td><select class="tema_bakat_select2 col-sm-12 tema_bakat" name="tema_bakat_create[]" id="tema_bakat_create"></select></td>'
            html +=
                '<td><select class="js-example-basic-single col-sm-12 kategori_faktor" name="kategori_faktor_create[]" id="kategori_faktor_create">'
            html += '<option value=""></option>'
            html += '<option value="Core Faktor">Core Faktor</option>'
            html += '<option value="Secondary Faktor">Secondary Faktor</option>'
            html += '</select></td>'
            html +=
                '<td><input class="form-control digits nilai" type="number" name="nilai_create[]" id="nilai_create" placeholder="Input nilai dalam bentuk angka" min="1" max="5"/></td>'
            html += '<td><button type="button" class="btn btn-sm btn-danger remove">Delete Field</button></td>'
            html += '</tr>'
            $('#body').append(html);

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
                            results: data.map(function (item) {
                                item.id = item.id_tema_bakat;
                                item.text = item.nama_tema;
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
        }
        $(document).on('click', '#add', function () {
            create_field()
        });

        $(document).on('click', '.remove', function () {
            $(this).closest("tr").remove();
        });


        var id_parameter_del = ""
        $(document).on("click", ".delete-btn", function () {
            var item = table.row($(this).closest('tr')).data();
            document.getElementById('bodi_hapus').innerHTML =
                'Apakah anda yakin akan menghapus data ?';
            id_parameter_del = item.id_job_family;
        });

        $('#create_form').on("submit", function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('parameter.store') }}",
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function () {
                    $('#create-data').attr('disabled', 'disabled');
                },
                cache: false,
                success: function (res) {
                    if (res.status == 200) {
                        $('#create-data').attr('disabled', false);
                        table.draw()
                        document.getElementById("create_form").reset();
                        // $("select").val(null);
                        $("#createModal").modal('hide');
                        swal({
                            title: "Pesan",
                            icon: 'success',
                            text: "Data berhasil ditambahkan",
                        })
                    } else {
                        $('#create-data').removeAttr('disabled');
                        swal({
                            title: "Pesan",
                            icon: 'error',
                            text: "gagal menambahkan data",
                        })
                    }
                }
            })
        });

        $(document).on("click", "#edit-data", function () {
            $.ajax({
                type: "PUT",
                url: '/pernyataan/update/' + id_modal_edit,
                data: {
                    pernyataan: $("#pernyataan_edit").val(),
                    tema_bakat_id: $("#tema_bakat_edit").val()
                },
                cache: false,
                success: function (res) {
                    console.log(res.status);
                    if (res.status == 200) {
                        $("#editModal").modal('hide');
                        table.draw()
                    }
                }
            })
        });

        $(document).on("click", ".detail-btn", function () {
            var data = table.row($(this).closest('tr')).data();
            // console.log(dat/a);
            $('#tema_bakat_detail').val(data.tema_bakat)
            $('#pernyataan_detail').val(data.pernyataan)
        });

        $(document).on("click", "#konfirmasi-del", function () {
            console.log(id_parameter_del);
            $.ajax({
                type: "POST",
                url: '/parameter/destroy/' + id_parameter_del,
                cache: false,
                success: function (res) {
                    if (res.status == 200) {
                        $("#deleteModal").modal('hide');
                        table.draw()
                        swal({
                            title: "Pesan",
                            icon: 'success',
                            text: "Data berhasil dihapus",
                        })
                    }
                }
            })
        });
    })

</script>
@endpush
