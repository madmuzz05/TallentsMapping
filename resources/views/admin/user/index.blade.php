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
      <div class="col-lg-6">
      </div>
    </div>
  </div>
</div>        
      <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Alternative pagination</h5>
                        <span>
                            The default page control presented by DataTables (forward and backward buttons with up to 7 page numbers in-between) is fine for most situations, but there are cases where you may wish to customise the options
                            presented to the end user. This is done through DataTables' extensible pagination mechanism, the pagingType option.
                        </span>
                    </div>
                    <div class="card-body">
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
    $('#user_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.getUser') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center'},
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'unit_kerja', name: 'unit_kerja.nama_unit_kerja' },
            { data: 'jabatan', name: 'jabatan.kategori_jabatan' },
            { data: 'hak_akses', name: 'hak_akses' },
        ]
    });
});
</script>
@endpush