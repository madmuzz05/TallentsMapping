@extends('layouts.admin.app')
@section('title', "Data User")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>User</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item active">User</li>
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
                    <div class="row">
                        <div class="m-b-0 col-sm-12 text-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#importModal"
                                class="btn btn-warning mb-2">Import Data</button>
                            <a href="{{ route('user.export') }}" class="btn btn-info mb-2">Export Data</a>
                            <a href="{{ route('user.add') }}" class="btn btn-success mb-2">Create Data</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2 row">
                        <div class="m-b-0 col-sm-12">
                            <form id="search_form" class="row row-cols-3 theme-form mt-3 form-bottom">
                                <!-- <a href="#myModal" data-bs-toggle="modal" class="btn btn-primary">Large modal</a> -->
                                <div class="mb-2 m-r-5 row d-flex">
                                    <label class="col-form-label col-lg-12">Nama</label>
                                    <input class="form-control" type="text" name="nama" placeholder="Search Nama"
                                        autocomplete="off" />
                                </div>
                                <div class="mb-2 row d-flex">
                                    <label class="col-form-label col-lg-12">Email address</label>
                                    <input class="form-control col-lg-12" type="text" name="email"
                                        placeholder="Search Email" autocomplete="off" />
                                </div>
                                <div class="mb-2 row d-flex">
                                    <label class="col-form-label col-lg-12">Departemen</label>
                                    <select class="unit_kerja_select2 clear_select2 col-sm-12 unit_kerja"
                                        name="unit_kerja" id="unit_kerja">
                                        <option value="">
                                        </option>
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
                    <div class="table-responsive mt-3 mb-5">
                        <table class="table table-bordered text-center" id="user_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Pegawai</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Departemen</th>
                                    <th>User Akses</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>No Pegawai</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Departemen</th>
                                    <th>User Akses</th>
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
<!-- detail modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail User</h4>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-12 mt-3 avatars text-center">
                        <div class="avatar">
                            <img class="img-70 mb-2 rounded-circle" src="{{asset('assets/images/user/16.png')}}"
                                alt="#">
                            <h4 class="mb-0" id="nama"></h4>
                            <p id="jabatan"></p>
                        </div>
                    </div>
                    <div class="col-lg-10 mt-2">
                        <form class="theme-form">
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <label for="inputEmail3">No Pegawai</label>
                                </div>
                                <div class="col-sm-8">
                                    <p id="no_pegawai"></p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3" for="inputPassword3">Departemen</label>
                                <div class="col-sm-9">
                                    <p id="unitKerja"></p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3" for="inputPassword3">Email</label>
                                <div class="col-sm-9">
                                    <p id="email"></p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3" for="inputPassword3">No Telepon</label>
                                <div class="col-sm-9">
                                    <p id="telepon"></p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3" for="inputPassword3">Alamat</label>
                                <div class="col-sm-9">
                                    <p id="alamat"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- end modal -->
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
                <input type="hidden" class="id_user_del" id="id_user_del" name="id_user_del" value="">
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
                <h5 class="modal-title">Import Data User</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
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
@endsection
@push('js')
<script>
    var table = $('#user_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "{{ route('user.getUser') }}",
            data: function (d) {
                d.nama = $('input[name=nama]').val();
                d.email = $('input[name=email]').val();
                d.unit_kerja = $('.unit_kerja').val();
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
                data: 'no_pegawai',
                name: 'users.no_pegawai'
            },
            {
                data: 'nama',
                name: 'users.nama'
            },
            {
                data: 'email',
                name: 'users.email'
            },
            {
                data: 'nama_unit',
                name: 'nama_unit'
            },
            {
                data: 'hak_akses',
                name: 'users.hak_akses'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ]
    });

    $('#search_form').on('submit', function (e) {
        table.draw()
        e.preventDefault();
    });
    $('#reset_form').on('click', function (e) {
        document.getElementById("search_form").reset();
        $('.clear_select2').val(null).trigger('change')
        table.draw()
        e.preventDefault();

    });
    $(document).on("click", ".detail-btn", function () {
        var id_modal = $(this).data('id');
        $.ajax({
            type: "GET",
            url: '/user/detail/' + id_modal,
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                $.each(res.data, function (key, item) {
                    document.getElementById('nama').innerHTML = item.nama;
                    document.getElementById('alamat').innerHTML = ":  " + item.alamat;
                    document.getElementById('email').innerHTML = ":  " + item.email;
                    document.getElementById('jabatan').innerHTML = item.instansi.nama_instansi
                    document.getElementById('unitKerja').innerHTML = ":  " + item.unit_kerja
                        .departemen
                    document.getElementById('no_pegawai').innerHTML = ":  " + item
                        .no_pegawai
                    document.getElementById('telepon').innerHTML = ":  " + item.telepon
                })
            }
        })
    });

    $(document).on("click", ".delete-btn", function () {
        var item = table.row($(this).closest('tr')).data();

        document.getElementById('bodi_hapus').innerHTML =
            'Apakah anda yakin akan Menghapus ' + item.nama + ' ?';
        document.getElementsByClassName('id_user_del')[0].value = item.id_user;
    });


    $(document).on("click", "#konfirmasi-del", function () {
        var id_user_del = document.getElementById('id_user_del').value
        $.ajax({
            type: "DELETE",
            url: '/user/destroy/' + id_user_del,
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
