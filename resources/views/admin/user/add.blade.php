@extends('layouts.admin.app')
@section('title', "Data User")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Tambah User</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a> </li>
                    <li class="breadcrumb-item active">Tambah User</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form class="form theme-form">
                    <div class="card-body">
                        <div class="alert alert-danger outline error-msg" id="error-msg" role="alert"
                            style="display:none">
                            <ul class="body-error-msg" id="body-error-msg">
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">No. Pegawai</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="no_pegawai" name="no_pegawai"
                                            placeholder="Nomor Pegawai" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="nama" name="nama"
                                            placeholder="Nama Lengkap" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Departemen</label>
                                    <div class="col-sm-9">
                                        <select class="unit_kerja_select2 col-sm-12 unit_kerja" name="unit_kerja"
                                            id="unit_kerja">
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Akses</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single col-sm-12" id="hak_akses"
                                            name="hak_akses">
                                            <option value=""></option>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="alamat" name="alamat"
                                            placeholder="Alamat" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">No Telepon</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="telepon" name="telepon"
                                            placeholder="No Telepon" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="Email" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="password" id="password"
                                                    name="password" placeholder="Password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                            <label class="col-sm-8 col-form-label">Confirm Password</label>
                                            <div class="col-sm-12">
                                                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                                                    placeholder="Confirm Password" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary" id="btn-submit">Submit</button>
                            <a href="/user/index" class="btn btn-light">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#btn-submit').on('click', function (e) {
            e.preventDefault();
            var d_nama = document.getElementById('nama').value;
            var d_no_pegawai = document.getElementById('no_pegawai').value;
            var d_hak_akses = document.getElementById('hak_akses').value;
            var d_unit_kerja = document.getElementById('unit_kerja').value;
            var d_alamat = document.getElementById('alamat').value;
            var d_telepon = document.getElementById('telepon').value;
            var d_email = document.getElementById('email').value;
            var d_password = document.getElementById('password').value;
            var d_password_confirmation = document.getElementById('password_confirmation').value;
            $.ajax({
                type: "POST",
                url: "{{route('user.store')}}",
                data: {
                    _token: $("#csrf").val(),
                    nama: d_nama,
                    no_pegawai: d_no_pegawai,
                    unit_kerja_id: d_unit_kerja,
                    hak_akses: d_hak_akses,
                    alamat: d_alamat,
                    telepon: d_telepon,
                    email: d_email,
                    password: d_password,
                    password_confirmation: d_password_confirmation,
                },
                success: function (res) {
                    console.log(res.error);
                    if (res.status == 200) {
                        swal({
                            title: "Pesan",
                            icon: 'success',
                            text: "Berhasil menambahkan data",
                        }).then(function () {
                            window.location = "/user/index"
                        });
                    } else {
                        swal({
                            title: "Pesan",
                            icon: 'error',
                            text: "gagal menambahkan data",
                        })
                    }
                }
            })

        })
    });

</script>
@endpush
