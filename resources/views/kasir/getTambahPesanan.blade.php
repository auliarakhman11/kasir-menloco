<div class="card">
    <div class="card-header">
        <h5>Pilih Service</h5>
    </div>
    <div class="card-boddy">
        @csrf
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="table_pilih_pesanan">
                    <tr>
                        <td>
                            <select name="service_id[]" class="form-control hitung_select" id="select_service0"
                                urutan="0" required>
                                <option value="">Pilih Service</option>
                                @foreach ($service as $d)
                                    <option value="{{ $d->id }}|{{ $d->harga }}">{{ $d->nm_service }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="form-control hitung_qty" type="number" name="qty[]" urutan="0"
                                id="qty0" value="1">
                        </td>
                        <td>
                            <p id="harga_tampil0">0</p>
                            <input type="hidden" name="harga[]" id="harga0">
                        </td>
                        <td>
                            <p id="total0">0</p>
                            <input type="hidden" id="total_hide0" class="total_hide" value="0">
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" id="btn_tambah_pilih_pesanan"><i
                                    class='bx bx-plus'></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><b>Total</b></td>
                        <td><b id="grand_total">0</b></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Dilayani Oleh</h5>
    </div>
    <div class="card-boddy">
        <div class="row">

            @foreach ($karyawan as $d)
                <div class="col-3">
                    <div class="quiz_card_area">
                        <input class="quiz_checkbox" type="checkbox" id="kry_{{ $d->id }}" name="karyawan_id[]"
                            value="{{ $d->id }}" />
                        <div class="single_quiz_card">
                            <div class="quiz_card_content">
                                <div class="quiz_card_icon">
                                    <div class="quiz_icon quiz_icon2"></div>
                                </div><!-- end of quiz_card_media -->

                                <div class="quiz_card_title">
                                    <h3><i class="fa fa-check" aria-hidden="true"></i> {{ $d->nama }}</h3>
                                </div><!-- end of quiz_card_title -->
                            </div><!-- end of quiz_card_content -->
                        </div><!-- end of single_quiz_card -->
                    </div><!-- end of quiz_card_area -->
                </div><!-- end of col3  -->
            @endforeach

        </div>
    </div>
</div>
