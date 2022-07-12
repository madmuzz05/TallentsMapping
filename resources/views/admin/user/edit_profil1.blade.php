@extends('layouts.admin.app')
@section('title', "Edit Profil")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Edit Profil</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Profil</li>
                    <li class="breadcrumb-item active">Edit Profil</li>
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
                <form id="create_form" class="form theme-form create_form" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                        <select class="unit_kerja_select2 col-sm-12 unit_kerja add_option"
                                            name="unit_kerja" id="unit_kerja">
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Akses</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$d->hak_akses}}" id="hak_akses"
                                            name="hak_akses" placeholder="hak_akses" readonly/>
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
                                    <label class="col-sm-3 col-form-label">Foto</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" value="" id="file" name="file"
                                            placeholder="Ganti Foto" />
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
                                    <input type="hidden" name="id_unit_kerja" id="id_unit_kerja"
                                        value="{{$d->unit_kerja_id}}">
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
                            <button class="btn btn-primary" type="submit" id="create-data">Submit</button>
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
        $('#create_form').on("submit", function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "{{ route('user.updateProfil') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#create-data').attr('disabled', 'disabled');
                },
                success: function (res) {
                    if (res.status == 200) {
                        swal({
                            title: "Pesan",
                            icon: 'success',
                            text: res.success,
                        }).then(function () {
                            window.history.back();
                            location.reload();
                        });
                    } else if (res.status == 405) {
                        swal("Pesan", res.errors, "error");
                        $('#create-data').removeAttr('disabled');
                    }
                }
            })
        });

        $.ajax({
            type: "GET",
            url: '/unit_kerja/detail/' + document.getElementById('id_unit_kerja').value,
            dataType: 'json',
            success: function (res) {
                console.log(res.data);
                $.each(res.data, function (key, data) {
                    $('.add_option').append('<option selected value="' + data
                        .id_unit_kerja + '">' + data.departemen + '</option>').trigger(
                        'change')
                })
            }
        })
    });

</script>
@endpush
