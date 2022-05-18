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
                            <div class="mb-2 d-flex">
                                <input class="form-control" type="text" name="nama" placeholder="Search Nama" autocomplete="off" />
                            </div>
                            <div class="mb-2 d-flex">
                                <input class="form-control" type="text" name="email" placeholder="Search Email" autocomplete="off" />
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
@endsection
@push('js')
<script>
$(function() {
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
            { data: 'id_user', name: 'users.id_user' },
            { data: 'nama', name: 'users.nama' },
            { data: 'email', name: 'users.email' },
            { data: 'unit_kerja.nama_unit_kerja', name: 'unit_kerja.nama_unit_kerja' },
            { data: 'jabatan.kategori_jabatan', name: 'jabatan.kategori_jabatan' },
            { data: 'hak_akses', name: 'users.hak_akses' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    $('#search_form').on('submit', function(e) {
        table.draw()
        e.preventDefault();
    });
    $('#reset_form').on('click', function(e) {
        document.getElementById("search_form").reset();
        table.draw()
        e.preventDefault();

    });
});
</script>
@endpush