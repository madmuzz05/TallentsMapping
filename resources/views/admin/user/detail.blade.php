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