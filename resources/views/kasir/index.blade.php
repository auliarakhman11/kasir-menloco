@extends('template.master')

@section('content')


    <!-- Content -->

    <style>
        *,
        *:before,
        *:after {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        :focus {
            outline: 0px;
        }

        .quiz_title {
            font-size: 30px;
            font-weight: 700;
            color: #292d3f;
            text-align: center;
            margin-bottom: 50px;
        }

        .quiz_card_area {
            position: relative;
            margin-bottom: 30px;
        }

        .single_quiz_card {
            border: 1px solid #efefef;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .quiz_card_title {
            padding: 10px;
            text-align: center;
            background-color: #d6d6d6;
        }

        .quiz_card_title h3 {
            font-size: 13px;
            font-weight: 400;
            color: #292d3f;
            margin-bottom: 0;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .quiz_card_title h3 i {
            opacity: 0;
        }

        .quiz_card_icon {
            max-width: 100%;
            min-height: 135px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quiz_icon {
            width: 70px;
            height: 75px;
            position: relative;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: auto;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            -o-transition: all 0.3s linear;
            -ms-transition: all 0.3s linear;
            -khtml-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .quiz_icon1 {
            background-image: url('https://img.icons8.com/ios-filled/32/000000/maxcdn.png');
        }

        .quiz_icon2 {
            background-image: url("{{ asset('img') }}/icons8-barber-64.png");
        }

        .quiz_icon3 {
            background-image: url('https://img.icons8.com/ios/50/000000/cloudflare.png');
        }

        .quiz_icon4 {
            background-image: url('https://img.icons8.com/dotty/80/000000/download-2.png');
        }

        .quiz_checkbox {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            cursor: pointer;
        }

        .quiz_checkbox:checked~.single_quiz_card {
            border: 1px solid #2575fc;
        }

        .quiz_checkbox:checked:hover~.single_quiz_card {
            border: 1px solid #2575fc;
        }

        .quiz_checkbox:checked~.single_quiz_card .quiz_card_content .quiz_card_title {
            background-color: #2575fc;
            color: #ffffff;
        }

        .quiz_checkbox:checked~.single_quiz_card .quiz_card_content .quiz_card_title h3 {
            color: #ffffff;
        }

        .quiz_checkbox:checked~.single_quiz_card .quiz_card_content .quiz_card_title h3 i {
            opacity: 1;
        }

        .quiz_checkbox:checked:hover~.quiz_card_title {
            border: 1px solid #2575fc;
        }

        /*Icon Selector*/

        .quiz_checkbox:checked~.single_quiz_card .quiz_card_content .quiz_card_icon {
            color: #2575fc;
        }

        .quiz_checkbox:checked~.single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon1 {
            background-image: url('https://img.icons8.com/nolan/32/000000/maxcdn.png');
        }

        .quiz_checkbox:checked~.single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon2 {
            background-image: url("{{ asset('img') }}/icons8-barber-64_2.png");
        }

        .quiz_checkbox:checked~.single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon3 {
            background-image: url('https://img.icons8.com/color/48/000000/cloudflare.png');
        }

        .quiz_checkbox:checked~.single_quiz_card .quiz_card_content .quiz_card_icon .quiz_icon4 {
            background-image: url('https://img.icons8.com/material-outlined/80/000000/download-2.png');
        }

        .quiz_card_icon {
            font-size: 50px;
            color: #000000;
        }

        .quiz_backBtn_progressBar {
            position: relative;
            margin-bottom: 60px;
        }

        .quiz_backBtn {
            background-color: transparent;
            border: 1px solid #d2d2d3;
            color: #8e8e8e;
            border-radius: 50%;
            position: absolute;
            top: -17px;
            left: 0px;
            width: 40px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
        }

        .quiz_backBtn:hover {
            color: #a9559b;
            border: 1px solid #2575fc;
        }

        .quiz_backBtn_progressBar .progress {
            margin-left: 50px;
            margin-top: 50px;
            height: 6px;
        }

        .quiz_backBtn_progressBar .progress-bar {
            background-color: #2575fc;
        }

        .quiz_next {
            text-align: center;
            margin-top: 50px;
        }

        .quiz_continueBtn {
            max-width: 315px;
            background-color: #2575fc;
            color: #ffffff;
            font-size: 18px;
            border-radius: 20px;
            padding: 10px 125px;
            border: 0;
        }
    </style>



    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-12 mb-4 order-0">

                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">Kasir</h4>
                        <button id="btn_input_data" type="button" class="btn btn-sm btn-primary float-end"
                            data-bs-toggle="modal" data-bs-target="#modal_add_pelanggan"><i class='bx bxs-plus-circle'></i>
                            Tambah Data</button>
                    </div>

                    <div class="card-body" id="table_antrian">



                    </div>

                </div>

                <div class="card mt-2">
                    <div class="card-header">
                        <h4 class="float-start">Selesai</h4>
                    </div>

                    <div class="card-body" id="table_selesai">



                    </div>

                </div>

                {{-- <div class="card mt-3">
          <div class="card-header">
              <h5 class="float-start">Kirim Berkas</h5>
              
          </div>
          <div class="card-body" id="cart">

          </div>
          <div class="card-footer">
            <button type="button" id="btn_input_data" class="btn btn-sm btn-primary float-end"><i class='bx bx-send'></i> Kirim</button>
          </div>
        </div> --}}


            </div>

            <!-- Total Revenue -->

            <!--/ Total Revenue -->

        </div>

    </div>
    <!-- / Content -->

    <form id="form_add_pelanggan">
        <div class="modal fade" id="modal_add_pelanggan" tabindex="-1" aria-labelledby="modal_add_pelangganLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_add_pelangganLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="table_input">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_add_pelanggan">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="form_add_pesanan">
        <div class="modal fade" id="modal_add_pesanan" tabindex="-1" aria-labelledby="modal_add_pesananLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_add_pesananLabel">Tambah Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="table_pesanan">

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="invoice_id" name="id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_add_pesanan">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="modal_detail_pesanan" tabindex="-1" aria-labelledby="modal_detail_pesananLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_detail_pesananLabel">Detail Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="table_detail_pesanan">

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="invoice_id" name="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="" id="btn_print" class="btn btn-primary"><i class='bx bx-printer'></i>
                        Print</a>
                </div>
            </div>
        </div>
    </div>

    <form id="form_refund">
        <div class="modal fade" id="modal_refund" tabindex="-1" aria-labelledby="modal_refundLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_refundLabel">Refund</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="invoice_id_refund" name="id">
                            <div class="col-12">
                                <label for="">Alasan Refund</label>
                                <input type="text" name="ket_refund" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_add_refund">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <!-- Modal -->

@section('script')
    <script src="{{ asset('js') }}/qrcode.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).ready(function() {


            <?php if(session('success')): ?>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                icon: 'success',
                title: '<?= session('success') ?>'
            });
            <?php endif; ?>

            <?php if(session('error_kota')): ?>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                icon: 'error',
                title: "{{ session('error_kota') }}"
            });
            <?php endif; ?>

            <?php if($errors->any()): ?>
            Swal.fire({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                icon: 'error',
                title: ' Ada data yang tidak sesuai, periksa kembali'
            });
            <?php endif; ?>

            function getAntrian() {
                $('#table_antrian').html(
                    '<div class="spinner-border text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.get('getAntrian', function(data) {
                    $('#table_antrian').html(data);
                });
            }
            getAntrian();

            function getSelesai() {
                $('#table_selesai').html(
                    '<div class="spinner-border text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.get('getSelesai', function(data) {
                    $('#table_selesai').html(data);
                });
            }
            getSelesai();

            $(document).on('click', '#btn_input_data', function() {

                $('#table_input').html(
                    '<div class="spinner-border text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.get('getInput', function(data) {
                    $('#table_input').html(data);
                });

            });


            $(document).on('submit', '#form_add_pelanggan', function(event) {
                event.preventDefault();

                $('#btn_add_pelanggan').attr('disabled', true);
                $('#btn_add_pelanggan').html('Loading..');


                $.ajax({
                    url: "{{ route('addPelanggan') }}",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {


                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Data Berhasil Diinput'
                        });

                        getAntrian();

                        $('#form_add_pelanggan').trigger("reset");
                        $('#modal_add_pelanggan').modal('hide');

                        $("#btn_add_pelanggan").removeAttr("disabled");
                        $('#btn_add_pelanggan').html(
                            'Save'); //tombol

                    },
                    error: function(data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                        $("#btn_add_pelanggan").removeAttr("disabled");
                        $('#btn_add_pelanggan').html(
                            'Save'); //tombol
                    }
                });

            });

            $(document).on('click', '.delete_pelanggan', function() {

                if (confirm("Apakah anda yakin?") == true) {
                    $(this).html(
                        '<div class="spinner-border text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>'
                    );
                    var invoice_id = $(this).attr('invoice_id');
                    $.get('deletePelanggan/' + invoice_id, function(data) {
                        getAntrian();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Data Berhasil Dihapus'
                        });
                    });
                }


            });

            $(document).on('click', '.add_pesanan', function() {

                var invoice_id = $(this).attr('invoice_id');
                $('#invoice_id').val(invoice_id);

                $('#table_pesanan').html(
                    '<div class="spinner-border text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>'
                );

                $.get('getTambahPesanan', function(data) {
                    $('#table_pesanan').html(data);
                });


            });

            var count_pesanan = 1;
            $(document).on('click', '#btn_tambah_pilih_pesanan', function() {
                count_pesanan = count_pesanan + 1;
                var html_code = '<tr id="row' + count_pesanan + '">';

                html_code +=
                    '<td><select name="service_id[]" class="form-control hitung_select" id="select_service' +
                    count_pesanan + '" urutan="' + count_pesanan +
                    '"required><option value="">Pilih Service</option>@foreach ($service as $d)<option value="{{ $d->id }}|{{ $d->harga }}">{{ $d->nm_service }}</option>@endforeach</select></td>';

                html_code +=
                    '<td><input class="form-control hitung_qty" type="number" name="qty[]" urutan="' +
                    count_pesanan + '" id="qty' + count_pesanan + '" value="1"></td>';

                html_code +=
                    '<td><p id="harga_tampil' + count_pesanan +
                    '">0</p><input type="hidden" name="harga[]" id="harga' + count_pesanan + '"></td>';

                html_code +=
                    '<td><p id="total' + count_pesanan + '">0</p><input type="hidden" id="total_hide' +
                    count_pesanan + '" class="total_hide"></td>';

                html_code += '<td><button type="button" data-row="row' +
                    count_pesanan +
                    '" class="btn btn-primary btn-sm remove_pesanan"><i class="bx bx-minus"></i></button></td>';

                html_code += "</tr>";

                $('#table_pilih_pesanan').append(html_code);
            });

            $(document).on('click', '.remove_pesanan', function() {
                var delete_row = $(this).data("row");
                $('#' + delete_row).remove();

                let grand_total = 0;
                $(".total_hide").each(function(index, element) {
                    // 'this' refers to the current DOM element in the loop
                    // 'index' is the zero-based index of the current element
                    // 'element' is the current DOM element
                    grand_total += parseInt($(this).val()); // Example: add a class to each element
                });

                var diskon = parseInt($('#jml_diskon').val());
                var tot = grand_total - diskon;

                $('#grand_total').html(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });

            $(document).on('change', '.hitung_select', function() {
                let dt_select = $(this).val();
                let urutan = $(this).attr('urutan');
                if (dt_select != '') {
                    let dt_harga = dt_select.split("|");
                    let harga = parseInt(dt_harga[1]);
                    let qty = parseInt($('#qty' + urutan).val());
                    $('#harga_tampil' + urutan).html(harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g,
                        ","));
                    $('#harga' + urutan).val(harga);
                    let total = harga * qty;
                    $('#total' + urutan).html(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $('#total_hide' + urutan).val(total);
                } else {
                    $('#harga_tampil' + urutan).html(0);
                    $('#harga' + urutan).val(0);

                    $('#total' + urutan).html(0);
                    $('#total_hide' + urutan).val(0);
                }

                let grand_total = 0;
                $(".total_hide").each(function(index, element) {
                    // 'this' refers to the current DOM element in the loop
                    // 'index' is the zero-based index of the current element
                    // 'element' is the current DOM element
                    grand_total += parseInt($(this).val()); // Example: add a class to each element
                });

                var diskon = parseInt($('#jml_diskon').val());
                var tot = grand_total - diskon;

                $('#grand_total').html(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            });

            $(document).on('keyup', '.hitung_qty', function() {
                let qty = parseInt($(this).val());
                let urutan = $(this).attr('urutan');
                let dt_select = $('#select_service' + urutan).val();
                let harga = 0;
                if (dt_select != '') {
                    let dt_harga = dt_select.split("|");
                    harga = parseInt(dt_harga[1]);
                } else {
                    harga = 0;
                }

                let total = 0;
                if (harga && qty) {
                    total = harga * qty;
                } else {
                    total = 0;
                }

                $('#harga_tampil' + urutan).html(harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('#harga' + urutan).val(harga);
                $('#total' + urutan).html(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('#total_hide' + urutan).val(total);

                let grand_total = 0;
                $(".total_hide").each(function(index, element) {
                    // 'this' refers to the current DOM element in the loop
                    // 'index' is the zero-based index of the current element
                    // 'element' is the current DOM element
                    grand_total += parseInt($(this).val()); // Example: add a class to each element
                });

                var diskon = parseInt($('#jml_diskon').val());
                var tot = grand_total - diskon;

                $('#grand_total').html(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            });

            function getDeatailPesanan(invoice_id) {
                $('#table_detail_pesanan').html(
                    '<div class="spinner-border text-secondary" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.get('getDeatailPesanan/' + invoice_id, function(data) {
                    $('#table_detail_pesanan').html(data);
                });
            }


            $(document).on('submit', '#form_add_pesanan', function(event) {
                event.preventDefault();

                $('#btn_add_pesanan').attr('disabled', true);
                $('#btn_add_pesanan').html('Loading..');


                $.ajax({
                    url: "{{ route('checkout') }}",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {


                        if (data) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'success',
                                title: 'Data Berhasil Diinput'
                            });

                            $('#modal_add_pesanan').modal('hide');
                            getAntrian();
                            getSelesai();

                            var invoice_id = $('#invoice_id').val();
                            getDeatailPesanan(invoice_id);
                            $('#modal_detail_pesanan').modal('show');

                            $('#btn_print').attr('href', "{{ route('printNota') }}?inv=" +
                                invoice_id);
                        } else {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'error',
                                title: 'Input pegawai terlebih dahulu'
                            });
                        }

                        $("#btn_add_pesanan").removeAttr("disabled");
                        $('#btn_add_pesanan').html(
                            'Save'); //tombol

                    },
                    error: function(data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                        $("#btn_add_pesanan").removeAttr("disabled");
                        $('#btn_add_pesanan').html(
                            'Save'); //tombol
                    }
                });

            });

            $(document).on('click', '.refund_pesanan', function() {

                var invoice_id = $(this).attr('invoice_id');
                $('#invoice_id_refund').val(invoice_id);

            });

            $(document).on('submit', '#form_refund', function(event) {
                event.preventDefault();

                $('#btn_add_refund').attr('disabled', true);
                $('#btn_add_refund').html('Loading..');


                $.ajax({
                    url: "{{ route('refundInvoice') }}",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {


                        if (data) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'success',
                                title: 'Data Berhasil Direfund'
                            });

                            $('#modal_refund').modal('hide');
                            getSelesai();
                            $('#form_refund').trigger("reset");

                        } else {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                icon: 'error',
                                title: 'Input pegawai terlebih dahulu'
                            });
                        }

                        $("#btn_add_refund").removeAttr("disabled");
                        $('#btn_add_refund').html(
                            'Save'); //tombol

                    },
                    error: function(data) { //jika error tampilkan error pada console
                        console.log('Error:', data);
                        $("#btn_add_refund").removeAttr("disabled");
                        $('#btn_add_refund').html(
                            'Save'); //tombol
                    }
                });

            });

            $(document).on('change', '#pilih_diskon', function() {

                var dt_diskon = $(this).val();

                var diskon = dt_diskon != "" ? parseInt(dt_diskon) : 0;

                let grand_total = 0;
                $(".total_hide").each(function(index, element) {
                    grand_total += parseInt($(this).val()); // Example: add a class to each element
                });

                if (diskon != 0 && diskon <= 100) {
                    var jml_diskon = grand_total > 0 ? grand_total * diskon / 100 : 0;

                } else if (diskon != 0 && diskon > 100) {
                    var jml_diskon = diskon;
                } else {
                    var jml_diskon = 0;
                }

                $("#nominal_diskon").html(jml_diskon.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('#jml_diskon').val(jml_diskon);

                var tot = grand_total - jml_diskon;

                $('#grand_total').html(tot.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            });

        });
    </script>
@endsection
@endsection
