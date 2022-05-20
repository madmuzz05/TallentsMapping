@extends('layouts.admin.app')

@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Detail User</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Data</li>
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">User</a> </li>
                    <li class="breadcrumb-item active">Detail User</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card col-lg-4">
            <div class="row justify-content-center">
                <div class="col-lg-12 m-t-40 avatars text-center">
                    <div class="avatar">
                        <img class="img-70 mb-3 rounded-circle" src="{{asset('assets/images/user/16.png')}}"alt="#">
                        <h4 class="mb-0" id="nama"></h4>
                        <p id="jabatan"></p>
                        <input type="hidden" id="id_user" value="{{$id}}">
                    </div>
                </div>
                <div class="col-lg-10 mt-2">
                    <form class="theme-form">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="inputEmail3">No Pegawai</label>
                            </div>
                            <div class="col-sm-8">
                                <p id="no_pegawai"></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3" for="inputPassword3">Unit Kerja</label>
                            <div class="col-sm-9">
                                <p id="unit_kerja"></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3" for="inputPassword3">Email</label>
                            <div class="col-sm-9">
                                <p id="email"></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3" for="inputPassword3">No Telepon</label>
                            <div class="col-sm-9">
                                <p id="telepon"></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="mb-4 col-sm-3" for="inputPassword3">Alamat</label>
                            <div class="col-sm-9">
                                <p id="alamat"></p>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="col-lg-12 mb-3 text-end">
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
@push('js')
<script>
    $(document).ready(function () {
        var id_user = document.getElementById('id_user').value
       
    })

</script>
@endpush
