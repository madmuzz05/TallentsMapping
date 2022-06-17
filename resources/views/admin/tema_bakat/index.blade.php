@extends('layouts.admin.app')
@section('title', "Data Tema Bakat")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Tema Bakat</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Tema Bakat</li>
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
                        <a href="{{ route('tema_bakat.export') }}" class="btn btn-info mb-2">Export Data</a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#createModal"
                            class="btn btn-success mb-2">Create Data</button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3 mb-5 mr-3 ml-3">
                        <table class="table table-bordered text-center " id="tema_bakat_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tema</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tema</th>
                                    <th>Deskripsi</th>
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
                <input type="hidden" class="id_tema_bakat_del" id="id_tema_bakat_del" name="id_tema_bakat_del" value="">
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
                <h5 class="modal-title">Import Data Tema Bakat</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tema_bakat.import') }}" method="POST" enctype="multipart/form-data">
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
                <h5 class="modal-title">Create Data Tema Bakat</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama Tema</label>
                    <div class="col-sm-9">
                        <input class="form-control nama_tema" type="text" name="nama_tema" id="nama_tema" value=""
                            required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea class="form-control deskripsi" id="deskripsi_create" rows="3" name="deskripsi_create"
                            value="" required></textarea>
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
                <h5 class="modal-title">Edit Data Tema Bakat</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <input type="hidden" class="id_tema_bakat_edit" id="id_tema_bakat_edit" name="id_tema_bakat_edit"
                    value="">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama Tema</label>
                    <div class="col-sm-9">
                        <input class="form-control nama_tema" type="text" name="nama_tema_edit" id="nama_tema_edit"
                            value="" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea class="form-control deskripsi" id="deskripsi_edit" rows="3" name="deskipsi_edit"
                            required></textarea>
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
                <h5 class="modal-title">Detail Data Tema Bakat</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama Tema</label>
                    <div class="col-sm-9">
                        <input class="form-control nama_tema" type="text" name="nama_tema_detail" id="nama_tema_detail"
                            value="" readonly />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea class="form-control deskripsi" id="deskripsi_detail" rows="3" name="deskipsi_detail"
                            readonly></textarea>
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
    var table = $('#tema_bakat_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('tema_bakat.getTemaBakat') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'nama_tema',
                name: 'nama_tema'
            },
            {
                data: 'deskripsi',
                name: 'deskripsi'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    })

    var id_tema_bakat_edit = ""
    $(document).on("click", ".edit-btn", function () {
        var item = table.row($(this).closest('tr')).data();
        id_tema_bakat_edit = item.id_tema_bakat;
        document.getElementsByClassName('nama_tema')[1].value = item
            .nama_tema;
        document.getElementsByClassName('deskripsi')[1].value = item
            .deskripsi;

    });

    var id_tema_bakat_del = ""
    $(document).on("click", ".delete-btn", function () {
        var item = table.row($(this).closest('tr')).data();
        document.getElementById('bodi_hapus').innerHTML =
            'Apakah anda yakin akan Menghapus ' + item.nama_tema + ' ?';
        id_tema_bakat_del = item
            .id_tema_bakat;
    });

    $(document).on("click", "#create-data", function () {
        $.ajax({
            type: "POST",
            url: "{{ route('tema_bakat.store') }}",
            data: {
                _token: $("#csrf").val(),
                nama_tema: $("#nama_tema").val(),
                deskripsi: $("#deskripsi_create").val()
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
            url: '/tema_bakat/update/' + id_tema_bakat_edit,
            data: {
                _token: $("#csrf").val(),
                nama_tema: $("#nama_tema_edit").val(),
                deskripsi: $("#deskripsi_edit").val()
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
        var item = table.row($(this).closest('tr')).data();
        document.getElementById('nama_tema_detail').value = item.nama_tema;
        document.getElementById('deskripsi_detail').value = item
            .deskripsi;
    });

    $(document).on("click", "#konfirmasi-del", function () {
        $.ajax({
            type: "DELETE",
            url: '/tema_bakat/destroy/' + id_tema_bakat_del,
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
