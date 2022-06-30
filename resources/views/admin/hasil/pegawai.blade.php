@extends('layouts.admin.app')
@section('title', "Paramater Penilaian")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Hasil Assesmen By Pegawai</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Assesmen</li>
                    <li class="breadcrumb-item active">Hasil Assesmen By Pegawai</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mt-3 mb-5 mr-3 ml-3">
                        <table class="table table-bordered text-center " id="hasil_table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Job Family</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Job Family</th>
                                    <th>Nilai</th>
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
<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfimasi</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="bodi_hapus"></p>
                <input type="hidden" class="id_hasil_del" id="id_hasil_del" name="id_hasil_del" value="">
                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="konfirmasi-del" type="button">Ya</button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
<!-- detail modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rekomendasi"></h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Kode Pegawai</label>
                        <div class="col-sm-9">
                            <input class="form-control kode_pegawai" type="text" name="kode_pegawai_detail"
                                id="kode_pegawai_detail" value="" readonly />
                        </div>
                    </div>
                    <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-9">
                        <input class="form-control nama" type="text" name="nama_detail" id="nama_detail" value=""
                            readonly />
                    </div>
                </div>
                <div class="row mr-5 ml-5">
                    <div class="col-lg-12 table-responsive-lg text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Job Family</td>
                                    <td>Nilai</td>
                                </tr>
                            </thead>
                            <tbody class="body_edit">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
@endsection
@push('js')
<script>
    $(document).ready(function () {
        var table = $('#hasil_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('hasil.pegawai') }}"
                // data: function (d) {
                //     d.pernyataan = $('input[name=pernyataan]').val();
                //     d.nama_tema = $('.tema_bakat_select2').val();
                //     return d;
                // }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: 'text-center',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'user.nama',
                    name: 'user.nama'
                },
                {
                    data: 'job_family.job_family',
                    name: 'job_family.job_family'
                },
                {
                    data: 'nilai',
                    name: 'nilai'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        })




        var id_hasil_del = ""
        $(document).on("click", ".delete-btn", function () {
            var item = table.row($(this).closest('tr')).data();
            document.getElementById('bodi_hapus').innerHTML =
                'Apakah anda yakin akan menghapus data ?';
            id_hasil_del = item.user_id;
        });

        $(document).on("click", ".detail-btn", function () {
            var data = table.row($(this).closest('tr')).data();
            // console.log(data);
            document.getElementById("rekomendasi").innerHTML = "Detail "+data.user.nama
            $('#kode_pegawai_detail').val(data.user.no_pegawai)
            $('#nama_detail').val(data.user.nama)
            var html = '';
            $.ajax({
                type: "GET",
                url: '/hasil/show/pegawai/' + data.user_id,
                cache: false,
                success: function (res) {
                    // console.log(res.data);
                    var html_edit = ''
                        var i=1
                        $('.body_edit').html('');
                    $.each(res.data, function (key, item) {
                        html_edit = '<tr>'
                        html_edit += '<td>'+i+'</td>'
                        html_edit += '<td>'+item.job_family.job_family+'</td>'
                        html_edit += '<td>'+item.nilai+'</td>'
                        html_edit += '</tr>'
                        $('.body_edit').append(html_edit);
                        i++
                    })
                }
            })
        });

        $(document).on("click", "#konfirmasi-del", function () {
            console.log(id_hasil_del);
            $.ajax({
                type: "DELETE",
                url: '/hasil/destroy/pegawai/' + id_hasil_del,
                cache: false,
                success: function (res) {
                    if (res.status == 200) {
                        $("#deleteModal").modal('hide');
                        table.draw()
                    }
                }
            })
        });
    })
</script>
@endpush
