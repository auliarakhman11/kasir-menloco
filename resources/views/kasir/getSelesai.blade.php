<div class="table-responsive">
    <table class="table table-sm table-striped">
        <thead>
            <tr class="text-center">
                <th>Antrian</th>
                <th>Waktu Selesai</th>
                <th>Invoice</th>
                <th>Customer</th>
                <th>No WA</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($antrian as $d)
                <tr class="text-center">
                    <td>{{ $d->no_antrian }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($d->updated_at)) }}</td>
                    <td>{{ $d->no_invoice }}</td>
                    <td>{{ $d->nm_customer }}</td>
                    <td>{{ $d->no_tlp }}</td>
                    <td>{{ number_format($d->total - $d->diskon, 0) }}</td>
                    <td>
                        <a href="{{ route('printNota', ['inv' => $d->id]) }}" class="btn btn-sm btn-primary"><i
                                class='bx bx-printer'></i></a>
                        <button invoice_id="{{ $d->id }}" class="btn btn-sm btn-primary refund_pesanan"
                            data-bs-toggle="modal" data-bs-target="#modal_refund"><i class='bx bx-refresh'></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
