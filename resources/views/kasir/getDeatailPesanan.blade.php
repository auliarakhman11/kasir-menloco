<table class="table table-sm">
    <thead>
        <tr>
            <th>#Invoice</th>
            <th>: {{ $invoice->no_invoice }}</th>
        </tr>
        <tr>
            <th>Waktu</th>
            <th>: {{ date('d/m/Y H:i', strtotime($invoice->updated_at)) }}</th>
        </tr>
        <tr>
            <th>Dilayani oleh</th>
            <th>:
                @if ($invoice->penjualanKaryawan)
                    @foreach ($invoice->penjualanKaryawan as $k)
                        {{ $k->karyawan->nama }},
                    @endforeach

                @endif
            </th>
        </tr>
    </thead>
</table>
<table class="table table-sm" mt-2>
    <thead>
        <tr>
            <th>#</th>
            <th>Service</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @if ($invoice->penjualan)
            @php
                $i = 1;
                $grand_total = 0;
            @endphp
            @foreach ($invoice->penjualan as $d)
                @php
                    $grand_total += $d->qty * $d->harga;
                @endphp
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $d->qty }} X {{ $d->service->nm_service }}</td>
                    <td>{{ number_format($d->harga, 0) }}</td>
                    <td>{{ number_format($d->qty * $d->harga, 0) }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"><b>Total</b></td>
            <td><b>{{ number_format($grand_total, 0) }}</b></td>
        </tr>
    </tfoot>
</table>
