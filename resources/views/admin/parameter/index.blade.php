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
                    <li class="breadcrumb-item">Master Data</li>
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
                        <button type="button" data-bs-toggle="modal" data-bs-target="#importModal"
                            class="btn btn-warning mb-2">Import Data</button>
                        <a href="{{ route('parameter.export') }}" class="btn btn-info mb-2">Export Data</a>
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
                <h5 class="modal-title">Create Data Pernyataan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Pernyataan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control pernyataan" id="pernyataan_create" rows="3"
                            name="pernyataan_create" value="" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Tema Bakat</label>
                    <div class="col-sm-9">
                        <select class="tema_bakat_select2 col-sm-12 tema_bakat" name="tema_bakat_create"
                            id="tema_bakat_create">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="create-data" type="button">Simpan</button>
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
                <h5 class="modal-title">Edit Data Pernyataan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <input type="hidden" class="id_pernyataan_edit" id="id_pernyataan_edit" name="id_pernyataan_edit"
                    value="">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Pernyataan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control pernyataan_edit" id="pernyataan_edit" rows="3"
                            name="pernyataan_edit" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Tema Bakat</label>
                    <div class="col-sm-9">
                        <select class="col-sm-12 tema_bakat_select2 add_option" name="tema_bakat_edit"
                            id="tema_bakat_edit">
                        </select>
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
                    data: 'core_faktor',
                    name: 'core_faktor'
                },
                {
                    data: 'sec_faktor',
                    name: 'sec_faktor'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        })
        var id_modal_edit = "";
        $(document).on("click", ".edit-btn", function () {
            var data = table.row($(this).closest('tr')).data();
            id_modal_edit = data.id_pernyataan;
            $('.pernyataan_edit').val(data.pernyataan)
            $('.add_option').append('<option selected value="' + data.tema_bakat_id + '">' + data
                .tema_bakat +
                '</option>').trigger('change')
        });

        var id_parameter_del = ""
        $(document).on("click", ".delete-btn", function () {
            var item = table.row($(this).closest('tr')).data();
            document.getElementById('bodi_hapus').innerHTML =
                'Apakah anda yakin akan menghapus data ?';
            id_parameter_del = item.id_parameter_penilaian;
        });

        $(document).on("click", "#create-data", function () {
            $.ajax({
                type: "POST",
                url: "{{ route('pernyataan.store') }}",
                data: {
                    _token: $("#csrf").val(),
                    pernyataan: $("#pernyataan_create").val(),
                    tema_bakat_id: $("#tema_bakat_create").val()
                },
                cache: false,
                success: function (res) {
                    if (res.status == 200) {
                        $("#createModal").modal('hide');
                        table.draw()
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
            $.ajax({
                type: "DELETE",
                url: '/pernyataan/destroy/' + id_pernyataan_del,
                cache: false,
                success: function (res) {
                    if (res.status == 200) {
                        $("#deleteModal").modal('hide');
                        table.draw()
                    }
                }
            })
        });
    })

</script>
@endpush
