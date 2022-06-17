@extends('layouts.admin.app')
@section('title', "Data Jabatan")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Jabatan</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Jabatan</li>
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
                            <a href="{{ route('jabatan.export') }}" class="btn btn-info mb-2">Export Data</a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#createModal"
                                class="btn btn-success mb-2">Create Data</button>

                        </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3 mb-5 mr-3 ml-3">
                        <table class="table table-bordered text-center " id="jabatan_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jabatan</th>
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
                <input type="hidden" class="id_jabatan_del" id="id_jabatan_del" name="id_jabatan_del" value="">
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
                <h5 class="modal-title">Import Data Jabatan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jabatan.import') }}" method="POST" enctype="multipart/form-data">
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
                <h5 class="modal-title">Create Data Jabatan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama Jabatan</label>
                    <div class="col-sm-9">
                        <input class="form-control kategori_jabatan" type="text" name="kategori_jabatan"
                            id="kategori_jabatan" value="" required/>
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
                <h5 class="modal-title">Edit Data Jabatan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama Jabatan</label>
                    <div class="col-sm-9">
                        <input type="hidden" class="id_jabatan_edit" id="id_jabatan_edit" name="id_jabatan_edit" value="">
                        <input class="form-control kategori_jabatan" type="text" name="kategori_jabatan"
                            id="kategori_jabatan_edit" value="" required/>
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
    var table = $('#jabatan_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('jabatan.getJabatan') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'kategori_jabatan',
                name: 'kategori_jabatan'
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
            url: '/jabatan/detail/' + id_modal_edit,
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                $.each(res.data, function (key, item) {
                    document.getElementById('id_jabatan_edit').value = item
                        .id_jabatan;
                    document.getElementsByClassName('kategori_jabatan')[1].value = item
                        .kategori_jabatan;
                })
            }
        })
    });

    $(document).on("click", ".delete-btn", function () {
        var id_modal_delete = $(this).data('id');
        $.ajax({
            type: "GET",
            url: '/jabatan/detail/' + id_modal_delete,
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                $.each(res.data, function (key, item) {
                    document.getElementById('bodi_hapus').innerHTML =
                        'Apakah anda yakin akan Menghapus ' + item.kategori_jabatan + ' ?';
                    document.getElementsByClassName('id_jabatan_del')[0].value = item
                        .id_jabatan;
                })
            }
        })
    });



    $(document).on("click", "#create-data", function () {
        $.ajax({
            type: "POST",
            url: '/jabatan/store',
            data: {
                _token: $("#csrf").val(),
                kategori_jabatan: $("#kategori_jabatan").val()
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
        var id_jabatan_edit = document.getElementById('id_jabatan_edit').value
        $.ajax({
            type: "PUT",
            url: '/jabatan/update/'+id_jabatan_edit,
            data: {
                _token: $("#csrf").val(),
                kategori_jabatan: $("#kategori_jabatan_edit").val()
            },
            cache: false,
            success: function (res) {
                if (res.status == 200) {
                    $("#editModal").modal('hide');
                    table.draw()
                }
            }
        })
    });

    $(document).on("click", "#konfirmasi-del", function () {
        var id_jabatan_del = document.getElementById('id_jabatan_del').value
        $.ajax({
            type: "DELETE",
            url: '/jabatan/destroy/' + id_jabatan_del,
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

</script>
@endpush
