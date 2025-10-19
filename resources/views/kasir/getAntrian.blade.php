<div class="table-responsive">
    <table class="table table-sm table-striped">
        <thead>
            <tr class="text-center">
                <th>Antrian</th>
                <th>Waktu</th>
                <th>Invoice</th>
                <th>Customer</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($antrian as $d)
                <tr class="text-center">
                    <td>{{ $d->no_antrian }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($d->created_at)) }}</td>
                    <td>{{ $d->no_invoice }}</td>
                    <td>{{ $d->nm_customer }}</td>
                    <td><button class="btn btn-sm btn-primary mt-2 add_pesanan" type="button" data-bs-toggle="modal"
                            data-bs-target="#modal_add_pesanan" invoice_id="{{ $d->id }}"><i
                                class='bx bxs-cart'></i></button> <button
                            class="btn btn-sm btn-primary mt-2 delete_pelanggan" invoice_id="{{ $d->id }}"
                            type="button"><i class='bx bxs-trash'></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
