<style>
    .invoice {
        margin: auto;
        width: 80mm;
        background: #FFF;
    }

    .huruf {
        font-size: 18px;
    }

    .huruf2 {
        font-size: 25px;
    }
</style>
<script>
    window.print();
</script>







<div class="invoice">
    <br>
    <center>
        <img width="150" src="{{ asset('img') }}/MEN_LOCO_BLACK.png" alt="">

    </center>
    <p align="center" class="huruf">Gentleman's Barber</p>
    <p style=" margin-top: -10px;" align="center" class="huruf">0813-4865-3988</p>
    {{-- <p style=" margin-top: -10px;" align="center" class="huruf">{{ $dt_invoice->cabang->alamat }}</p> --}}
    {{-- <p style=" margin-top: -10px;" align="center" class="huruf">Kota Banjarmasin</p> --}}


    <table width="100%">
        {{-- <tr>
        <td width="40%" class="huruf">No Invoice</td>
      <td style="text-align: left; " class="huruf">: {{ $dt_invoice->no_invoice }}</td>
    </tr> --}}
        <tr>
            <td width="40%" class="huruf">Waktu</td>
            <td style="text-align: left; " class="huruf">: {{ date('d M Y H:i', strtotime($invoice->updated_at)) }}
            </td>
        </tr>
        <!-- <tr>
        <td width="40%" class="huruf">Order</td>
      <td style="text-align: left; " class="huruf">: Kasir Orchard</td>
    </tr> -->
        <tr>
            <td width="40%" class="huruf">Dilayani oleh</td>
            <td style="text-align: left; font-size: 14px;" class="huruf">:
                @if ($invoice->penjualanKaryawan)
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($invoice->penjualanKaryawan as $kry)
                        @if ($i > 1)
                            ,
                        @endif
                        {{ $kry->karyawan->nama }}
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @endif

            </td>
        </tr>

        <tr>
            <td width="40%" class="huruf">Costumer</td>
            <td style="text-align: left; " class="huruf">: {{ $invoice->nm_customer }}</td>
        </tr>

        {{-- <tr>
            <td width="40%" class="huruf">Jenis Order</td>
            <td style="text-align: left; " class="huruf">:
                {{ $dt_invoice->delivery ? $dt_invoice->delivery->delivery : '' }}</td>
        </tr> --}}

        {{-- <tr>
            <td width="40%" class="huruf">Antrian</td>
            <td style="text-align: left; " class="huruf">: {{ $dt_invoice->urutan }}</td>
        </tr> --}}

    </table>

    <hr>
    @php
        $total_produk = 0;
        $qty_produk = 0;
    @endphp
    <table width="100%">
        @foreach ($invoice->penjualan as $d)
            <tr class="huruf" style="margin-bottom: 2px;">
                <td width="10%">{{ $d->qty }}</td>
                <td width="70%">{{ ucwords($d->service->nm_service) }}</td>

                <td width="20%" style="text-align: right;">
                    <strong>{{ number_format($d->harga * $d->qty, 0) }}</strong>
                </td>
            </tr>
            @php
                $total_produk += $d->harga * $d->qty;
                $qty_produk += $d->qty;
            @endphp
        @endforeach



    </table>
    <hr>
    <table width="100%">
        {{-- <?php if($invoice->diskon !=0): ?>
        <tr class="huruf">
            <td>Diskon</td>
            <td style="text-align: right;"><?= number_format($invoice->diskon, 0) ?></td>
        </tr>
      <?php endif; ?> --}}

        {{-- <?php if($invoice->dp !=0): ?>
        <tr class="huruf">
            <td>DP</td>
            <td style="text-align: right;"><?= number_format($invoice->dp, 0) ?></td>
        </tr>
        <?php endif; ?> --}}

        {{-- <?php if($invoice->bca_kredit !=0): ?>
        <tr class="huruf">
            <td>Kredit BCA</td>
            <td style="text-align: right;"><?= number_format($invoice->bca_kredit, 0) ?></td>
        </tr>
        <?php endif; ?>
        <?php if($invoice->bca_debit !=0): ?>
        <tr class="huruf">
            <td>Debit BCA</td>
            <td style="text-align: right;"><?= number_format($invoice->bca_debit, 0) ?></td>
        </tr>
        <?php endif; ?>
        <?php if($invoice->mandiri_kredit !=0): ?>
        <tr class="huruf">
            <td>Kredit Mandiri</td>
            <td style="text-align: right;"><?= number_format($invoice->mandiri_kredit, 0) ?></td>
        </tr>
        <?php endif; ?>
        <?php if($invoice->mandiri_debit !=0): ?>
        <tr class="huruf">
            <td>Debit Mandiri</td>
            <td style="text-align: right;"><?= number_format($invoice->mandiri_debit, 0) ?></td>
        </tr>
        <?php endif; ?>
        <?php if($invoice->cash !=0) : ?>
        <tr class="huruf">
            <td>Cash</td>
            <td style="text-align: right;"><?= number_format($invoice->cash, 0) ?></td>
        </tr>
        <?php endif; ?> --}}
        <tr class="huruf">
            <td><strong>Total {{ $qty_produk }} Service</strong></td>
            <td style="text-align: right;"><strong>{{ number_format($total_produk, 0) }}</strong></td>
        </tr>
        {{-- @if ($dt_invoice->diskon > 0)
            <tr class="huruf">
                <td><strong>Diskon</strong></td>
                <td style="text-align: right;"><strong>{{ number_format($dt_invoice->diskon, 0) }}</strong></td>
            </tr>
            <tr class="huruf">
                <td><strong>Grand Total</strong></td>
                <td style="text-align: right;">
                    <strong>{{ number_format($total_produk - $dt_invoice->diskon, 0) }}</strong>
                </td>
            </tr>
        @endif --}}

        {{-- <tr class="huruf">
            <td>Total Pembayaran</td>
            <td style="text-align: right;">{{ number_format($dt_invoice->dibayar, 0) }}</td>
        </tr>
        <tr class="huruf">
            <td>Kembalian</td>
            <td style="text-align: right;">
                {{ number_format($dt_invoice->dibayar - ($total_produk - $dt_invoice->diskon), 0) }}</td>
        </tr> --}}
    </table>
    <hr>
    <hr>
    <p class="huruf" align="center">Terimakasih</p>
    {{-- <p class="huruf" align="center" style="margin-top: -10px;">Call 081151-88778</p> --}}
    <p class="huruf" align="center">Instagram : menloco.id</p>
    {{-- <p class="huruf" align="center">Youtube : kebabyasmin</p> --}}
    <p class="huruf" align="center">Terbayar</p>

    @php
        $zona_waktu = date('d M Y h:i');

    @endphp
    <p class="huruf" align="center" style="margin-top: -10px;"><-------- <?= $zona_waktu ?> --------></p>



    <!-- <script>
        var url = document.getElementById('url').value;
        var count = 5; // dalam detik
        function countDown() {
            if (count > 0) {
                count--;
                var waktu = count + 1;
                $('#pesan').html('Anda akan di redirect ke ' + url + ' dalam ' + waktu + ' detik.');
                setTimeout("countDown()", 1000);
            } else {
                window.location.href = url;
            }
        }
        countDown();
    </script>  -->
