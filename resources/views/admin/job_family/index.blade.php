@extends('layouts.admin.app')
@section('title', "Data Job Family")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Job Family</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Job Family</li>
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
                        <a href="{{ route('job_family.export') }}" class="btn btn-info mb-2">Export Data</a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#createModal"
                            class="btn btn-success mb-2">Create Data</button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-3 mb-5 mr-3 ml-3">
                        <table class="table table-bordered text-center " id="job_family_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Job Family</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Job Family</th>
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
                <input type="hidden" class="id_job_family_del" id="id_job_family_del" name="id_job_family_del" value="">
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
                <h5 class="modal-title">Import Data Job Family</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('job_family.import') }}" method="POST" enctype="multipart/form-data">
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
                <h5 class="modal-title">Create Data Job Family</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Kode</label>
                    <div class="col-sm-9">
                        <input class="form-control kode" type="text" name="kode" id="kode" value=""/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama Job Family</label>
                    <div class="col-sm-9">
                        <input class="form-control job_family" type="text" name="job_family" id="job_family" value=""
                            />
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
                <h5 class="modal-title">Edit Data Job Family</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <input type="hidden" class="id_job_family_edit" id="id_job_family_edit" name="id_job_family_edit"
                    value="">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Kode</label>
                    <div class="col-sm-9">
                        <input class="form-control kode" type="text" name="kode_edit" id="kode_edit" value=""
                            required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama Job Family</label>
                    <div class="col-sm-9">
                        <input class="form-control job_family" type="text" name="job_family_edit" id="job_family_edit"
                            value="" required />
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
    var table = $('#job_family_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('job_family.getJobFamily') }}"
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: 'text-center',
                orderable: false,
                searchable: false
            },
            {
                data: 'kode',
                name: 'kode'
            },
            {
                data: 'job_family',
                name: 'job_family'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    })

    var id_job_family_edit = ""
    $(document).on("click", ".edit-btn", function () {
        var item = table.row($(this).closest('tr')).data();
        id_job_family_edit = item.id_job_family;
        document.getElementsByClassName('kode')[1].value = item
            .kode;
        document.getElementsByClassName('job_family')[1].value = item
            .job_family;

    });

    var id_job_family_del = ""
    $(document).on("click", ".delete-btn", function () {
        var item = table.row($(this).closest('tr')).data();
        document.getElementById('bodi_hapus').innerHTML =
            'Apakah anda yakin akan Menghapus ' + item.job_family + ' ?';
        id_job_family_del = item
            .id_job_family;
    });

    $(document).on("click", "#create-data", function () {
        $.ajax({
            type: "POST",
            url: "{{ route('job_family.store') }}",
            data: {
                _token: $("#csrf").val(),
                kode: $("#kode").val(),
                job_family: $("#job_family").val()
            },
            cache: false,
            success: function (res) {
                if (res.status == 200) {
                        // $("select").val(null);
                        $("#createModal").modal('hide');
                    swal({
                        title: "Pesan",
                        icon: 'success',
                        text: "Data berhasil disimpan",
                    })
                    table.draw()
                } else {
                    swal({
                        title: "Pesan",
                        icon: 'error',
                        text: "Data gagal disimpan",
                    })
                }
            }
        })
    });

    $(document).on("click", "#edit-data", function () {
        $.ajax({
            type: "PUT",
            url: '/job_family/update/' + id_job_family_edit,
            data: {
                _token: $("#csrf").val(),
                kode: $("#kode_edit").val(),
                job_family: $("#job_family_edit").val()
            },
            cache: false,
            success: function (res) {
                console.log(res.status);
                if (res.status == 200) {
                    $("#editModal").modal('hide');
                    table.draw()
                    swal({
                        title: "Pesan",
                        icon: 'success',
                        text: "Data berhasil disimpan",
                    })
                }
            }
        })
    });

    // $(document).on("click", ".detail-btn", function () {
    //     var item = table.row($(this).closest('tr')).data();
    //     document.getElementById('nama_tema_detail').value = item.nama_tema;
    //     document.getElementById('deskripsi_detail').value = item
    //         .deskripsi;
    // });

    $(document).on("click", "#konfirmasi-del", function () {
        $.ajax({
            type: "DELETE",
            url: '/job_family/destroy/' + id_job_family_del,
            data: {
                _token: $("#csrf").val()
            },
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

</script>
@endpush
