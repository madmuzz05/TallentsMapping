@extends('layouts.admin.app')

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
                    <div class="m-b-0 col-sm-12 text-end">
                        <a href="{{ route('user.add') }}" class="btn btn-success">Create Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="search_form" class="row row-cols-sm-3 theme-form mt-3 form-bottom">
                        {{-- <a href="#myModal" data-bs-toggle="modal" class="btn btn-primary">Large modal</a> --}}
                        <div class="mb-2 d-flex">
                            <input class="form-control" type="text" name="nama" placeholder="Search Nama"
                                autocomplete="off" />
                        </div>
                        <div class="mb-2 d-flex">
                            <input class="form-control" type="text" name="email" placeholder="Search Email"
                                autocomplete="off" />
                        </div>
                        <div class="mb-2 d-flex">
                            <button type="submit" class="btn btn-primary me-2">Search</button>
                    </form>
                    <button id="reset_form" class="btn btn-secondary">Reset</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="user_table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit Kerja</th>
                                <th>Jabatan</th>
                                <th>User Akses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit Kerja</th>
                                <th>Jabatan</th>
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
<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                                <label class="col-sm-3" for="inputPassword3">Unit Kerja</label>
                                <div class="col-sm-9">
                                    <p id="unit_kerja"></p>
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
@endsection
@push('js')
<script>
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
                    document.getElementById('jabatan').innerHTML = item.jabatan.kategori_jabatan
                    document.getElementById('unit_kerja').innerHTML = ":  " + item.unit_kerja.nama_unit_kerja
                    document.getElementById('no_pegawai').innerHTML = ":  " + item.no_pegawai
                    document.getElementById('telepon').innerHTML = ":  " + item.telepon
                })
            }
        })
    });


    $(function () {
        var table = $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user.getUser') }}",
                data: function (d) {
                    d.nama = $('input[name=nama]').val();
                    d.email = $('input[name=email]').val();
                }
            },
            columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
                {
                    data: 'id_user',
                    name: 'users.id_user'
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
                    data: 'unit_kerja.nama_unit_kerja',
                    name: 'unit_kerja.nama_unit_kerja'
                },
                {
                    data: 'jabatan.kategori_jabatan',
                    name: 'jabatan.kategori_jabatan'
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
            table.draw()
            e.preventDefault();

        });
    });

</script>
@endpush
