@extends('layouts.admin.app')
@section('title', "Data Pernyataan")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Pernyataan</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Pernyataan</li>
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
                        <a href="{{ route('pernyataan.export') }}" class="btn btn-info mb-2">Export Data</a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#createModal"
                            class="btn btn-success mb-2">Create Data</button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3 mb-5 mr-3 ml-3">
                        <table class="table table-bordered text-center " id="pernyataan_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>Tema Bakat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Pernyataan</th>
                                    <th>Tema Bakat</th>
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
                <input type="hidden" class="id_pernyataan_del" id="id_pernyataan_del" name="id_pernyataan_del" value="">
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
<!-- Import modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data Pernyataan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pernyataan.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Upload File</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="file" />
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Upload</button>
                </form>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
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
                        <select class="js-example-basic-single col-sm-12 tema_bakat" name="tema_bakat_create"
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
                        <textarea class="form-control pernyataan" id="pernyataan_edit" rows="3" name="pernyataan_edit"
                            value="" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Tema Bakat</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-single col-sm-12 tema_bakat_edit" name="tema_bakat_edit"
                            id="tema_bakat_edit">
                            <option value=""></option>
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
                            <textarea class="form-control pernyataan" id="pernyataan_edit" rows="3"
                                name="pernyataan_edit" value="" required></textarea>
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
    var table = $('#pernyataan_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('pernyataan.getPernyataan') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'pernyataan',
                name: 'pernyataan.pernyataan'
            },
            {
                data: 'tema_bakat',
                name: 'tema_bakat'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    })

    $(document).on("click", ".edit-btn", function () {
        var id_modal_edit = $(this).data('id');
        $.ajax({
            type: "GET",
            url: '/pernyataan/detail/' + id_modal_edit,
            dataType: 'json',
            success: function (res) {
                // console.log(res.data);
                var option_edit = ''
                $.each(res.data, function (key, item) {
                    document.getElementById('id_pernyataan_edit').value = item
                        .id_pernyataan;
                    document.getElementsByClassName('pernyataan')[1].value = item
                        .pernyataan;
                    option_edit += ' <option value="' + item.tema_bakat.id_tema_bakat + '">' + item.tema_bakat.nama_tema + '</option>'
                })
                $(".tema_bakat_edit").append(option_edit)
            }
        })
    });

    $(document).on("click", ".delete-btn", function () {
        var id_modal_delete = $(this).data('id');
        $.ajax({
            type: "GET",
            url: '/pernyataan/detail/' + id_modal_delete,
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                $.each(res.data, function (key, item) {
                    document.getElementById('bodi_hapus').innerHTML =
                        'Apakah anda yakin akan menghapus data ?';
                    document.getElementsByClassName('id_pernyataan_del')[0].value = item
                        .id_pernyataan;
                })
            }
        })
    });

    $(document).on("click", "#create-data", function () {
        $.ajax({
            type: "POST",
            url: "{{ route('pernyataan.store') }}",
            data: {
                _token: $("#csrf").val(),
                pernyataan: $("#pernyataan").val(),
                tema_bakat_id: $("#tema_bakat").val()
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
        var id_pernyataan_edit = document.getElementById('id_pernyataan_edit').value
        $.ajax({
            type: "PUT",
            url: '/pernyataan/update/' + id_pernyataan_edit,
            data: {
                _token: $("#csrf").val(),
                pernyataan: $("#pernyataan").val(),
                tema_bakat_id: $("#tema_bakat").val()
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
        var id_modal = $(this).data('id');
        $.ajax({
            type: "GET",
            url: '/pernyataan/detail/' + id_modal,
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                $.each(res.data, function (key, item) {
                    document.getElementById('pernyataan_detail').value = item.pernyataan;
                    document.getElementById('deskripsi_detail').value = item
                        .tema_bakat.nama_tema;
                })
            }
        })
    });

    $(document).on("click", "#konfirmasi-del", function () {
        var id_pernyataan_del = document.getElementById('id_pernyataan_del').value
        $.ajax({
            type: "DELETE",
            url: '/pernyataan/destroy/' + id_pernyataan_del,
            data: {
                _token: $("#csrf").val()
            },
            cache: false,
            success: function (res) {
                if (res.status == 200) {
                    $("#deleteModal").modal('hide');
                    table.draw()
                }
            }
        })
    });

    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "{{route('tema_bakat.getTemaBakat')}}",
            dataType: 'json',
            success: function (res) {
                // console.log(res.data);
                var option = ''
                $.each(res.data, function (key, item) {
                    option += ' <option value="' + item.id_tema_bakat + '">' + item
                        .nama_tema + '</option>'
                })
                $(".tema_bakat").append(option)
                $(".tema_bakat_edit").append(option)
            }
        })
    });

</script>
@endpush
