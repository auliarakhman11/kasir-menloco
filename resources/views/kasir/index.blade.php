@extends('template.master')

@section('content')


    <!-- Content -->
    <img id="logo_print" src="{{ asset('img') }}/MEN_LOCO_BLACK.png" style="display:none;" crossorigin="anonymous">

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
                    <a href="#" id="btn_print" class="btn btn-primary"><i class='bx bx-printer'></i> Print</a>
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

                            $('#btn_print').attr('href', "#");
                            $('#btn_print').attr('onclick', "printBluetooth(" + invoice_id + "); return false;");
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

            $(document).on('click', '#btn_kirim_wa', function() {
                const no_invoice = $(this).attr("no_invoice");

                $(this).html(
                    '<div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $(this).attr("disabled", true);

                $.ajax({
                    url: "{{ route('sendWa') }}",
                    method: 'GET',
                    dataType: "json",
                    data: {
                        no_invoice: no_invoice
                    },
                    success: function(data) {

                        if (data == true) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Struk pembelian berhasil dikirim",
                                showConfirmButton: !1,
                                timer: 1500
                            });

                            $('#btn_kirim_wa').html(
                                'Kirim WA <i class="mdi mdi-whatsapp"></i>');
                            $('#btn_kirim_wa').removeAttr("disabled");
                        } else {
                            $('#btn_kirim_wa').html(
                                'Kirim WA <i class="mdi mdi-whatsapp"></i>');
                            $('#btn_kirim_wa').removeAttr("disabled");
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: "Error! ada masalah! Cek Nomor Wa!",
                                showConfirmButton: !1,
                                timer: 1500
                            });
                        }

                    },
                    error: function(err) { //jika error tampilkan error pada console
                        $('#btn_kirim_wa').html(
                            'Kirim WA <i class="mdi mdi-whatsapp"></i>');
                        $('#btn_kirim_wa').removeAttr("disabled");
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: "Error! ada masalah!",
                            showConfirmButton: !1,
                            timer: 1500
                        });
                        console.log(err);

                    }
                });

            });

        });

// Function to convert image to ESC/POS raster format
function getImageData(imgElement, maxWidth = 384) {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    
    // Scale image to fit printer width (typically 384 dots for 58mm printer)
    const scale = Math.min(1, maxWidth / imgElement.width);
    const width = Math.round(imgElement.width * scale);
    const height = Math.round(imgElement.height * scale);
    
    canvas.width = width;
    canvas.height = height;
    
    // Fill white background to avoid transparent issues
    ctx.fillStyle = '#FFFFFF';
    ctx.fillRect(0, 0, width, height);
    
    ctx.drawImage(imgElement, 0, 0, width, height);
    
    const imageData = ctx.getImageData(0, 0, width, height);
    const pixels = imageData.data;
    
    // Width in bytes (8 pixels per byte)
    const bytesWidth = Math.ceil(width / 8);
    const rasterData = new Uint8Array(bytesWidth * height);
    
    for (let y = 0; y < height; y++) {
        for (let x = 0; x < width; x++) {
            const idx = (y * width + x) * 4;
            const r = pixels[idx];
            const g = pixels[idx + 1];
            const b = pixels[idx + 2];
            // Since we filled white, alpha is mostly 255. Just check brightness
            const isBlack = ((r + g + b) / 3 < 128);
            
            if (isBlack) {
                const byteIdx = y * bytesWidth + Math.floor(x / 8);
                const bitPosition = 7 - (x % 8);
                rasterData[byteIdx] |= (1 << bitPosition);
            }
        }
    }
    
    // Construct ESC/POS GS v 0 command
    // 1D 76 30 00 xL xH yL yH [data]
    const header = new Uint8Array([
        0x1D, 0x76, 0x30, 0x00,
        bytesWidth & 0xFF, (bytesWidth >> 8) & 0xFF,
        height & 0xFF, (height >> 8) & 0xFF
    ]);
    
    const result = new Uint8Array(header.length + rasterData.length);
    result.set(header, 0);
    result.set(rasterData, header.length);
    
    return result;
}

function textToBytes(text) {
    let arr = new Uint8Array(text.length);
    for(let i=0; i<text.length; i++) {
        arr[i] = text.charCodeAt(i);
    }
    return arr;
}

function padRight(text, width) {
    text = text.toString();
    if(text.length >= width) return text.substring(0, width);
    return text + ' '.repeat(width - text.length);
}

function padLeft(text, width) {
    text = text.toString();
    if(text.length >= width) return text.substring(text.length - width);
    return ' '.repeat(width - text.length) + text;
}

function formatRow(left, right, width = 32) {
    left = left.toString();
    right = right.toString();
    let padding = width - left.length - right.length;
    if (padding < 1) padding = 1;
    return left + ' '.repeat(padding) + right + '\n';
}

function formatDateCustom(dateString) {
    let d = new Date(dateString);
    let day = String(d.getDate()).padStart(2, '0');
    let month = String(d.getMonth() + 1).padStart(2, '0');
    let year = d.getFullYear();
    let hours = String(d.getHours()).padStart(2, '0');
    let minutes = String(d.getMinutes()).padStart(2, '0');
    return day + '/' + month + '/' + year + ' ' + hours + ':' + minutes;
}

async function printBluetooth(invoice_id, btnElement = null) {
    let printButton = btnElement || document.getElementById('btn_print');
    let originalText = printButton ? printButton.innerHTML : '';
    try {
        if (printButton) {
            printButton.innerHTML = "<i class='bx bx-loader-alt bx-spin'></i>";
            printButton.style.pointerEvents = "none";
        }

        // Fetch invoice data
        const response = await fetch('/getInvoiceJson/' + invoice_id);
        const invoice = await response.json();
        
        let printData = [];
        
        // Init printer
        printData.push(new Uint8Array([0x1B, 0x40]));
        
        // Center alignment
        printData.push(new Uint8Array([0x1B, 0x61, 0x01]));
        
        // Print logo
        const imgElement = document.getElementById('logo_print');
        if (imgElement && imgElement.complete && imgElement.naturalWidth !== 0) {
            // max width for 58mm printer is ~384 dots. We use 250 for good fit
            const imgData = getImageData(imgElement, 250); 
            printData.push(imgData);
            printData.push(textToBytes('\n')); // new line after image
        } else {
            // Fallback if image fails to load
            printData.push(textToBytes("MEN LOCO\n"));
        }
        
        // Header text
        printData.push(textToBytes("Gentleman's Barber\n0813-4865-3988\n\n"));
        
        // Left alignment
        printData.push(new Uint8Array([0x1B, 0x61, 0x00]));
        
        // Details
        printData.push(textToBytes("Waktu         : " + formatDateCustom(invoice.updated_at) + "\n"));
        
        let karyawanNames = '';
        if (invoice.penjualan_karyawan && invoice.penjualan_karyawan.length > 0) {
            karyawanNames = invoice.penjualan_karyawan.map(pk => pk.karyawan ? pk.karyawan.nama : '').filter(n => n).join(", ");
        }
        
        printData.push(textToBytes("Dilayani oleh : " + (karyawanNames || '-') + "\n"));
        printData.push(textToBytes("Costumer      : " + (invoice.nm_customer || '-') + "\n"));
        
        printData.push(textToBytes("--------------------------------\n"));
        
        let totalProduk = 0;
        let qtyProduk = 0;
        
        if (invoice.penjualan && invoice.penjualan.length > 0) {
            invoice.penjualan.forEach((item) => {
                let sName = item.service ? item.service.nm_service : '';
                let leftStr = item.qty + "  " + sName;
                let rightStr = (item.harga * item.qty).toLocaleString('en-US');
                printData.push(textToBytes(formatRow(leftStr, rightStr, 32)));
                totalProduk += item.harga * item.qty;
                qtyProduk += item.qty;
            });
        }
        
        printData.push(textToBytes("--------------------------------\n"));
        
        printData.push(textToBytes(formatRow("Total " + qtyProduk + " Service", totalProduk.toLocaleString('en-US'), 32)));
        let diskonStr = invoice.diskon > 0 ? invoice.diskon.toLocaleString('en-US') : '-';
        printData.push(textToBytes(formatRow("Diskon", diskonStr, 32)));
        let grandTotal = totalProduk - invoice.diskon;
        printData.push(textToBytes(formatRow("Grand Total", grandTotal.toLocaleString('en-US'), 32)));
        
        printData.push(textToBytes("--------------------------------\n\n"));
        
        // Center alignment
        printData.push(new Uint8Array([0x1B, 0x61, 0x01]));
        printData.push(textToBytes("Terimakasih\n\nInstagram : menloco.id\n\nTerbayar\n"));
        printData.push(textToBytes("<------ " + formatDateCustom(new Date()) + " ------>\n\n\n\n"));
        
        // Concatenate all ArrayBuffers
        let totalLength = printData.reduce((acc, val) => acc + val.length, 0);
        let finalData = new Uint8Array(totalLength);
        let offset = 0;
        for(let arr of printData) {
            finalData.set(arr, offset);
            offset += arr.length;
        }

        // Web Bluetooth Connection
        const device = await navigator.bluetooth.requestDevice({
            filters: [
                { services: ['000018f0-0000-1000-8000-00805f9b34fb'] }
            ],
            optionalServices: ['000018f0-0000-1000-8000-00805f9b34fb', 'e7810a71-73ae-499d-8c15-faa9aef0c3f2']
        });
        
        const server = await device.gatt.connect();
        
        // Try getting common printer services
        let service;
        try {
            service = await server.getPrimaryService('000018f0-0000-1000-8000-00805f9b34fb');
        } catch(e) {
            service = await server.getPrimaryService('e7810a71-73ae-499d-8c15-faa9aef0c3f2');
        }
        
        let characteristic;
        try {
            characteristic = await service.getCharacteristic('00002af1-0000-1000-8000-00805f9b34fb');
        } catch(e) {
            try {
                characteristic = await service.getCharacteristic('bef8d6c9-9c21-4c9e-b632-bd58c1009f9f');
            } catch(ex) {
                // Get the first characteristic if standard ones aren't found
                const characteristics = await service.getCharacteristics();
                characteristic = characteristics[0];
            }
        }
        
        // Print data in chunks (some printers have small MTU)
        const CHUNK_SIZE = 512;
        for (let i = 0; i < finalData.length; i += CHUNK_SIZE) {
            const chunk = finalData.slice(i, i + CHUNK_SIZE);
            await characteristic.writeValue(chunk);
        }
        
        Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            icon: 'success',
            title: 'Berhasil mencetak!'
        });

        if (printButton) {
            printButton.innerHTML = originalText;
            printButton.style.pointerEvents = "auto";
        }
        
    } catch (e) {
        console.error("Print error: ", e);
        // Only alert if it's not a user cancellation
        if (e.name !== 'NotFoundError' && e.name !== 'SecurityError') {
             alert('Gagal mencetak: ' + e.message);
        }
        if (printButton) {
            printButton.innerHTML = originalText || "<i class='bx bx-printer'></i>";
            printButton.style.pointerEvents = "auto";
        }
    }
}

    </script>
@endsection
@endsection
