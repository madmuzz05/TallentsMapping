@extends('layouts.admin.app')
@section('title', "Data User")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Edit User</h3>
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
                @foreach($data as $d)
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
                                        <input class="form-control" type="text" id="no_pegawai"
                                            value="{{$d->no_pegawai}}" name="no_pegawai" placeholder="Nomor Pegawai" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$d->nama}}" id="nama"
                                            name="nama" placeholder="Nama Lengkap" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Departemen</label>
                                    <div class="col-sm-9">
                                        <select class="unit_kerja_select2 col-sm-12 unit_kerja add_option" name="unit_kerja"
                                            id="unit_kerja">
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Akses</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single col-sm-12" id="hak_akses"
                                            name="hak_akses">
                                            <option value="{{$d->hak_akses}}">{{$d->hak_akses}}</option>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$d->alamat}}" id="alamat"
                                            name="alamat" placeholder="Alamat" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">No Telepon</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$d->telepon}}" id="telepon"
                                            name="telepon" placeholder="No Telepon" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" id="email" value="{{$d->email}}"
                                            name="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                                    <input type="hidden" name="id_user" id="id_user" value="{{$d->id_user}}">
                                    <input type="hidden" name="id_unit_kerja" id="id_unit_kerja" value="{{$d->unit_kerja_id}}">
                                    <label class="col-sm-3 col-form-label">Password (Optional)</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" id="password" name="password"
                                            placeholder="Password" />
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
                @endforeach
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
            var d_id_user = document.getElementById('id_user').value
            var d_nama = document.getElementById('nama').value;
            var d_no_pegawai = document.getElementById('no_pegawai').value;
            var d_hak_akses = document.getElementById('hak_akses').value;
            var d_unit_kerja = document.getElementById('unit_kerja').value;
            var d_alamat = document.getElementById('alamat').value;
            var d_telepon = document.getElementById('telepon').value;
            var d_email = document.getElementById('email').value;
            var d_password = document.getElementById('password').value;

            $.ajax({
                type: "PUT",
                url: "{{route('user.update')}}",
                data: {
                    _token: $("#csrf").val(),
                    id_user: d_id_user,
                    nama: d_nama,
                    no_pegawai: d_no_pegawai,
                    unit_kerja_id: d_unit_kerja,
                    hak_akses: d_hak_akses,
                    alamat: d_alamat,
                    telepon: d_telepon,
                    email: d_email,
                    password: d_password,
                },
                success: function (res) {
                    if (res.status == 200) {
                        swal({
                            title: "Pesan",
                            icon: 'success',
                            text: res.success,
                        }).then(function () {
                            window.location = "/user/index"
                        });
                    } else if (res.status == 405) {
                        swal("Pesan", res.errors, "error");
                        $('#create-data').removeAttr('disabled');
                    }
                }
            })

        })

        $.ajax({
            type: "GET",
            url: '/unit_kerja/detail/' + document.getElementById('id_unit_kerja').value,
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                $.each(res.data, function (key, data) {
                    $('.add_option').append('<option selected value="' + data.id_unit_kerja + '">' + data.departemen +'</option>').trigger('change')
                })
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
                        .departemen + '</option>'
                })
                $(".unit_kerja").append(option)
            }
        })
    });

</script>
@endpush
