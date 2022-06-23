@extends('layouts.admin.app')
@section('title', "Hasil")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 xl-100 box-col-12">
            <div class="card">
                <div class="card-body">
                    <h2>End</h2>
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
        var a = new Array();
        $.ajax({
            type: "GET",
            url: "{{route('hasil.getHasil')}}",
            dataType: 'json',
            success: function (res) {
                $.each(res.users, function (key, i_users) {
                    $.each(res.parameters, function (key, i_parameters) {
                        $.each(res.simulasis, function (key, i_simulasis) {
                            if (i_simulasis.user_id == i_users.id_user) {
                                if (i_parameters.job_family_id == 2) {
                                    if (i_simulasis.pernyataan.tema_bakat_id == i_parameters.tema_bakat_id) {
                                        console.log(i_simulasis.pernyataan_id);
                                    }
                                }
                            }
                        })
                    })
                })
            }
        })
    })

</script>
@endpush
