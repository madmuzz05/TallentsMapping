@extends('layouts.user.app')
@section('title', "Assesmen")
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" id="data">
                        @include('user.asesmen.data')
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
    $(document).ready(function () {
        $(document).on('click', '.pagination a', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var current = $('input[name="currentPage"]').val()
            var lastPage = $('input[name="lastPage"]').val()
            fetch_data(page)
        });
        $(document).on('click', '.btn_submit', function (event) {
            var jumlah = $('input[name="jumlah_pertanyaan"]').val()
            var jawab = $('input[name="total"]').val()
            console.log('juma' + jumlah);
            console.log('jaw' + jawab);
            var ans = $('input[name="ans"]:checked').val()
            if (ans == null) {
                swal("Pesan", "Jawaban tidak boleh kosong", "error");
            }
            var id_pernyataan = $('input[name="id_pernyataan"]').val()
            var id_tema_bakat = $('input[name="id_tema_bakat"]').val()
            var currentPage = $('input[name="currentPage"]').val()
            console.log(id_pernyataan);
            $.ajax({
                url: "{{ route('simulasi.store') }}",
                method: "POST",
                data: {
                    sudah: 'Y',
                    id_pernyataan: id_pernyataan,
                    id_tema_bakat: id_tema_bakat,
                    ans: ans,
                },
                success: function (data) {

                    $('#data').html(data);

                }
            }).done(
                function () {
                    if (jumlah > jawab) {
                        swal("Pesan", "Mohon isi seluruh pernyataan", "error");
                    } else{
                        swal("Pesan", "Berhasil melakukan asesmen", "success").then(function () {
                            window.location = "/simulasi/show"
                        });
                    }
                }
            )

        });

        function fetch_data(page) {
            var ans = $('input[name="ans"]:checked').val()
            if (ans == null) {
                swal("Pesan", "Jawaban tidak boleh kosong", "error");
            }
            var id_pernyataan = $('input[name="id_pernyataan"]').val()
            var id_tema_bakat = $('input[name="id_tema_bakat"]').val()
            var currentPage = $('input[name="currentPage"]').val()
            console.log(id_pernyataan);
            $.ajax({
                url: "{{ route('simulasi.store') }}",
                method: "POST",
                data: {
                    page: page,
                    id_pernyataan: id_pernyataan,
                    id_tema_bakat: id_tema_bakat,
                    ans: ans,
                    currentPage: currentPage,
                },
                success: function (data, res) {
                    $('#data').html(data);
                }
            });
        }
    })

</script>
@endpush
