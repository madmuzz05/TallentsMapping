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
                    <div class="mb-2 row">
                        <div class="m-b-0 col-sm-12">
                            <form id="search_form" class="row row-cols-3 theme-form mt-3 form-bottom">
                                <!-- <a href="#myModal" data-bs-toggle="modal" class="btn btn-primary">Large modal</a> -->
                                <div class="mb-2 m-r-5 row d-flex">
                                    <label class="col-form-label col-lg-12">Pernyataan</label>
                                    <input class="form-control" type="text" name="pernyataan"
                                        placeholder="Search Pernyataan" autocomplete="off" />
                                </div>
                                <div class="mb-2 row d-flex">
                                    <label class="col-form-label col-lg-12">Tema bakat</label>
                                    <select class="col-sm-12 tema_bakat_select2" name="nama_tema">
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
                        <table class="table table-bordered text-center " id="pernyataan_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tema Bakat</th>
                                    <th>Pernyataan</th>
                                    <th>Bobot Nilai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tema Bakat</th>
                                    <th>Pernyataan</th>
                                    <th>Bobot Nilai</th>
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
<!-- Create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Parameter Penilaian Assesmen</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="create_form">
                    <div class="row mr-5 ml-5">
                        <div class="col-lg-12 table-responsive-lg text-center">
                            <div class="m-b-20 row">
                                <label class="col-sm-3 col-form-label">Tema Bakat</label>
                                <div class="col-sm-8">
                                    <select class="tema_bakat_select2 col-sm-12 tema_bakat_create"
                                        name="tema_bakat_create" id="tema_bakat_create" ></select>
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Pernyataan</td>
                                        <td>Bobot Nilai</td>
                                        <td><button type="button" class="btn btn-sm btn-info" id="add">Add
                                                Field</button></td>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <tr>
                                        <td><textarea class="form-control pernyataan_create" id="pernyataan_create"
                                                name="pernyataan_create[]" rows="3"
                                                ></textarea></td>
                                        <td><input class="form-control digits nilai" type="text" name="nilai_create[]"
                                                id="nilai_create" placeholder="Input nilai dalam bentuk angka"
                                                /></td>
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
                <h5 class="modal-title">Edit Data Pernyataan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_form">
                    <div class="row mr-5 ml-5">
                        <div class="col-lg-12 table-responsive-lg text-center">
                            <div class="m-b-20 row">
                                <label class="col-sm-3 col-form-label">Tema Bakat</label>
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control col-sm-12 tema_bakat_id_edit"
                                        name="tema_bakat_id_edit" id="tema_bakat_id_edit" readonly></input>
                                    <input type="text" class="form-control col-sm-12 tema_bakat_edit"
                                        name="tema_bakat_edit" id="tema_bakat_edit" readonly></input>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Pernyataan</td>
                                        <td>Bobot Nilai</td>
                                    </tr>
                                </thead>
                                <tbody class="body_edit">

                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="edit-data" type="submit">Simpan</button>
                </form>
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
        var table = $('#pernyataan_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('pernyataan.getPernyataan') }}",
                data: function (d) {
                    d.pernyataan = $('input[name=pernyataan]').val();
                    d.nama_tema = $('.tema_bakat_select2').val();
                    return d;
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'tema_bakat',
                    name: 'tema_bakat'
                },
                {
                    data: 'pernyataan',
                    name: 'pernyataan.pernyataan'
                },
                {
                    data: 'bobot_nilai',
                    name: 'pernyataan.bobot_nilai'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        })
        $('#search_form').on('submit', function (e) {
            table.draw()
            e.preventDefault();
        });
        $('#reset_form').on('click', function (e) {
            document.getElementById("search_form").reset();
            $('.tema_bakat_select2').val(null).trigger('change')
            table.draw()
            e.preventDefault();
        });
        $('#editModal').on("hide.bs.modal", function () {
            $('.body_edit').empty()
        })

        var html = '';

        function create_field() {
            html = '<tr>'
            html +=
                '<td><textarea class="form-control pernyataan_create" id="pernyataan_create" name="pernyataan_create[]" rows="3"></textarea></td>'
            html +=
                '<td><input class="form-control digits nilai" type="text" name="nilai_create[]" id="nilai_create" placeholder="Input nilai dalam bentuk angka"/></td>'
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

        var id_modal_edit = "";
        $(document).on("click", ".edit-btn", function () {
            var data = table.row($(this).closest('tr')).data();
            // console.log(data);
            $('.tema_bakat_edit').val(data.tema_bakat)
            $('.tema_bakat_id_edit').val(data.tema_bakat_id)
            id_modal_edit = data.id_pernyataan;

            load_ajax(data.tema_bakat_id)
        });

        function load_ajax(id_data) {
            $.ajax({
                type: "GET",
                url: "/pernyataan/edit/" + id_data,
                dataType: 'json',
                success: function (res) {
                    var html_edit = '';
                    $.each(res.data, function (key, item) {
                        // console.log(item.tema_bakat_id);
                        html_edit = '<tr>'
                        html_edit +=
                            '<td><textarea class="form-control pernyataan_edit" id="pernyataan_edit" name="pernyataan_edit[]" rows="3" name="pernyataan_edit" required>' +
                            item.pernyataan + '</textarea></td>'
                        html_edit +=
                            '<td><input class="form-control digits nilai" type="text" name="nilai_edit[]" id="nilai_edit" value="' +
                            item.bobot_nilai +
                            '" placeholder="Input nilai dalam bentuk angka" required/></td>'
                        html_edit += '</tr>'
                        html_edit +=
                            '<input type="hidden" id="id_pernyataan" name="id_pernyataan_edit[]" value="' +
                            item.id_pernyataan + '">'
                        $('.body_edit').append(html_edit);
                        $('.tema_bakat').append('<option selected value="' + item
                            .tema_bakat_id + '">' + item.tema_bakat.nama_tema +
                            '</option>')


                    })

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
                }
            })
        }

        var id_pernyataan_del = ""
        $(document).on("click", ".delete-btn", function () {
            var item = table.row($(this).closest('tr')).data();
            document.getElementById('bodi_hapus').innerHTML =
                'Apakah anda yakin akan menghapus data ?';
            id_pernyataan_del = item.tema_bakat_id;

        });

        $('#create_form').on("submit", function (e) {
            // console.log($(".nilai").val());
            var arr = document.getElementsByClassName('nilai');
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value))
                    tot += parseFloat(arr[i].value);
            }
            // console.log(tot);
            if (tot > 1) {
                swal({
                    title: "Pesan",
                    icon: 'info',
                    text: "Total bobot nilai tidak boleh dari 1",
                })
            } else {
                // console.log('n');
                $.ajax({
                    type: "POST",
                    url: "{{ route('pernyataan.store') }}",
                    data: $(this).serialize(),
                    dataType: 'json',
                    cache: false,
                    success: function (res) {
                        console.log(res.status);
                        if (res.status == 200) {
                            $("#createModal").modal('hide');
                            swal({
                                title: "Pesan",
                                icon: 'success',
                                text: "Data berhasil ditambahkan",
                            })
                            table.draw()
document.getElementById("create_form").reset();
                        } else {
                            swal({
                                title: "Pesan",
                                icon: 'error',
                                text: "gagal menambahkan data",
                            })
                        }
                    }
                })
            }
            e.preventDefault();

        });

        $('#edit_form').on("submit", function (e) {
            // console.log($(".nilai").val());
            var arr = document.getElementsByClassName('nilai');
            var tot = 0;
            for (var i = 0; i < arr.length; i++) {
                if (parseFloat(arr[i].value))
                    tot += parseFloat(arr[i].value);
            }
            // console.log(tot);
            if (tot > 1) {
                swal({
                    title: "Pesan",
                    icon: 'info',
                    text: "Total bobot nilai tidak boleh lebih dari 1",
                })
            } else {
                // console.log('n');
                $.ajax({
                    type: "POST",
                    url: "{{ route('pernyataan.update') }}",
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
                            document.getElementById("edit_form").reset();
                            // $("select").val(null);
                            $("#editModal").modal('hide');
                            swal({
                                title: "Pesan",
                                icon: 'success',
                                text: "Data berhasil disimpan",
                            })
                        }
                    }
                })
            }
            e.preventDefault();
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
