@extends('layouts.admin.app')

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
                                    <label class="col-sm-3 col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single col-sm-12 jabatan" name="jabatan"
                                            id="jabatan">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Unit Kerja</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single col-sm-12 unit_kerja" name="unit_kerja"
                                            id="unit_kerja">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Akses</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single col-sm-12" id="hak_akses"
                                            name="hak_akses">
                                            <option value=""></option>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
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
                                                <input class="form-control" type="password" name="password_confirmation"
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
            var d_jabatan = document.getElementById('jabatan').value;
            var d_unit_kerja = document.getElementById('unit_kerja').value;
            var d_alamat = document.getElementById('alamat').value;
            var d_telepon = document.getElementById('telepon').value;
            var d_email = document.getElementById('email').value;
            var d_password = document.getElementById('password').value;

            $.ajax({
                type: "POST",
                url: "{{route('user.store')}}",
                data: {
                    _token: $("#csrf").val(),
                    nama: d_nama,
                    no_pegawai: d_no_pegawai,
                    jabatan_id: d_jabatan,
                    unit_kerja_id: d_unit_kerja,
                    hak_akses: d_hak_akses,
                    alamat: d_alamat,
                    telepon: d_telepon,
                    email: d_email,
                    password: d_password,
                },
                success: function (res) {
                    var err = ''
                    const list = document.getElementById("body-error-msg")
                    while (list.hasChildNodes()) {
                        list.removeChild(list.firstChild);
                    }
                    $.each(res.errors, function (key, value) {
                        document.getElementsByClassName("error-msg")[0].style
                            .display = "block";
                        err += '<li>' + value + '</li>'
                    });
                    $('.body-error-msg').append(err)
                    if (res.status == 200) {
                        window.location = "/user/index"
                    }
                }
            })

        })

        $.ajax({
            type: "GET",
            url: "{{route('jabatan.getJabatan')}}",
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                var option = ''
                $.each(res.data, function (key, item) {
                    option += ' <option value="' + item.id_jabatan + '">' + item
                        .kategori_jabatan + '</option>'
                })
                $(".jabatan").append(option)
            }
        })

        $.ajax({
            type: "GET",
            url: "{{route('unit_kerja.getUnitKerja')}}",
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                var option = ''
                $.each(res.data, function (key, item) {
                    option += ' <option value="' + item.id_unit_kerja + '">' + item
                        .nama_unit_kerja + '</option>'
                })
                $(".unit_kerja").append(option)
            }
        })
    });

</script>
@endpush
