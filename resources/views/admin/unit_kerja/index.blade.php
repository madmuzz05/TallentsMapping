@extends('layouts.admin.app')
@section('title', "Data Departemen")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Departemen</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">Departemen</li>
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
                        <a href="{{ route('unit_kerja.export') }}" class="btn btn-info mb-2">Export Data</a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#createModal"
                            class="btn btn-success mb-2">Create Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2 row">
                        <div class="m-b-0 col-sm-12">
                            <form id="search_form" class="row row-cols-3 theme-form mt-3 form-bottom">
                                <div class="mb-2 m-r-5 row d-flex">
                                    <label class="col-form-label col-lg-12">Job Family</label>
                                    <select class="col-sm-12 job_family_select2" name="job_family_fil">
                                    </select>
                                </div>
                                <div class="mb-2 row d-flex">
                                    <label class="col-form-label col-lg-12">Departemen</label>
                                    <select class="col-sm-12 unit_kerja_select2" name="departemen_fil">
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="m-b-0 col-sm-12 text-end">
                            <button type="submit" class="btn btn-primary me-2">Search</button>
                            </form>
                            <button id="reset_form" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                    <div class="table-responsive mt-3 mb-5 mr-3 ml-3">
                        <table class="table table-bordered text-center " id="unit_kerja_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Job Family</th>
                                    <th>Departemen</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Job Family</th>
                                    <th>Departemen</th>
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
                <input type="hidden" class="id_unit_kerja_del" id="id_unit_kerja_del" name="id_unit_kerja_del" value="">
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
                <h5 class="modal-title">Import Data Unit Kerja</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('unit_kerja.import') }}" method="POST" enctype="multipart/form-data">
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
                <h5 class="modal-title">Create Data Departemen</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Job Family</label>
                    <div class="col-sm-9 mb-3">
                        <select class="job_family_select2 col-sm-12 job_family" name="job_family" id="job_family"
                            required>
                        </select>
                    </div>
                    <label class="col-sm-3 col-form-label">Departemen</label>
                    <div class="col-sm-9 mb-3">
                        <input class="form-control departemen" type="text" name="departemen" id="departemen" value=""
                            required />
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
                <h5 class="modal-title">Edit Data Departemen</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Job Family</label>
                    <div class="col-sm-9 mb-3">
                        <input type="hidden" class="id_unit_kerja_edit" id="id_unit_kerja_edit"
                            name="id_unit_kerja_edit" value="">
                        <select class="job_family_select2 col-sm-12 job_family add_option" name="job_family"
                            id="job_family_edit" required>
                        </select>
                    </div>
                    <label class="col-sm-3 col-form-label">Departemen</label>
                    <div class="col-sm-9">
                        <input class="form-control departemen" type="text" name="departemen" id="departemen_edit"
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
    var table = $('#unit_kerja_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('unit_kerja.getUnitKerja') }}",
            data: function (d) {
                d.job_family = $('.job_family_select2').val();
                d.departemen = $('.unit_kerja_select2').val();
                return d;
            },
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
                data: 'departemen',
                name: 'departemen'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    })
    $('#search_form').on('submit', function (e) {
        table.draw()
        e.preventDefault();
    });
    $('#reset_form').on('click', function (e) {
        $('.job_family_select2').val(null).trigger('change')
        $('.unit_kerja_select2').val(null).trigger('change')
        table.draw()
        e.preventDefault();

    });
    var id_unit_kerja_edit = "";
    var id_unit_kerja_del = "";
    $(document).on("click", ".edit-btn", function () {
        var data = table.row($(this).closest('tr')).data();
        console.log(data);
        $('.add_option').append('<option selected value="' + data.id_job_family + '">' + data.job_family +
            '</option>').trigger('change')
        document.getElementsByClassName('departemen')[1].value = data
            .departemen;
        id_unit_kerja_edit = data.id_unit_kerja;
    });

    $(document).on("click", ".delete-btn", function () {
        var data = table.row($(this).closest('tr')).data();
        document.getElementById('bodi_hapus').innerHTML =
            'Apakah anda yakin akan Menghapus ' + data.departemen + ' ?';
        document.getElementsByClassName('id_unit_kerja_del')[0].value = data
            .id_unit_kerja;
        id_unit_kerja_del = data.id_unit_kerja;
    });



    $(document).on("click", "#create-data", function () {
        $.ajax({
            type: "POST",
            url: '/unit_kerja/store',
            data: {
                job_family_id: $("#job_family").val(),
                departemen: $("#departemen").val()
            },
            cache: false,
            success: function (res) {
                if (res.status == 200) {
                    $("#job_family").val(null).trigger('change')
                    $("#departemen").val('')
                    $("#createModal").modal('hide');
                    table.draw()
                }
            }
        })
    });

    $(document).on("click", "#edit-data", function () {
        $.ajax({
            type: "PUT",
            url: '/unit_kerja/update/' + id_unit_kerja_edit,
            data: {
                job_family_id: $("#job_family_edit").val(),
                departemen: $("#departemen_edit").val()
            },
            cache: false,
            success: function (res) {
                if (res.status == 200) {
                    $("#job_family").val(null).trigger('change')
                    $("#departemen").val('')
                    $("#editModal").modal('hide');
                    table.draw()
                }
            }
        })
    });

    $(document).on("click", "#konfirmasi-del", function () {
        $.ajax({
            type: "DELETE",
            url: '/unit_kerja/destroy/' + id_unit_kerja_del,
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
