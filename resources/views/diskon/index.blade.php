@extends('template.master')

@section('content')


    <!-- Content -->

    <style>


    </style>



    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            <div class="col-12 mb-4 order-0">

                <div class="card">
                    <div class="card-header">
                        <h5 class="float-start">Data Diskon</h5>
                        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#modal_add_diskon"><i class='bx bxs-plus-circle'></i> Tambah Data</button>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-sm text-center" width="100%" id="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Diskon</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($diskon as $d)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $d->nm_diskon }}</td>
                                            <td>
                                                @if ($d->jumlah > 100)
                                                    {{ number_format($d->jumlah, 0) }}
                                                @else
                                                    {{ $d->jumlah }}%
                                                @endif
                                            </td>
                                            <td>
                                                @if ($d->void)
                                                    Tidak Aktif
                                                @else
                                                    Aktif
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modal_edit_diskon{{ $d->id }}"><i
                                                        class='bx bxs-message-square-edit'></i></button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

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



    <!-- Modal -->

    <form id="form_add_diskon" method="POST" action="{{ route('addDiskon') }}">
        @csrf
        <div class="modal fade" id="modal_add_diskon" tabindex="-1" aria-labelledby="modal_add_diskonLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_add_diskonLabel">Tambah Diskon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="">Nama Diskon</label>
                                    <input type="text" name="nm_diskon" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label for="">Jumlah Diskon</label>
                                    <input type="text" name="jumlah" class="form-control" required>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_add_diskon">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @foreach ($diskon as $d)
        <form method="POST" action="{{ route('editDiskon') }}">
            @csrf
            @method('patch')
            <div class="modal fade" id="modal_edit_diskon{{ $d->id }}" tabindex="-1"
                aria-labelledby="modal_edit_diskonLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal_edit_diskonLabel">Tambah Diskon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <input type="hidden" name="id" value="{{ $d->id }}">

                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Nama Diskon</label>
                                        <input type="text" name="nm_diskon" class="form-control"
                                            value="{{ $d->nm_diskon }}" required>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Jumlah Diskon</label>
                                        <input type="text" name="jumlah" class="form-control"
                                            value="{{ $d->jumlah }}" required>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="">Aktif</label>
                                        <select name="void" class="form-control">
                                            <option value="0" {{ $d->void == 0 ? 'selected' : '' }}>Aktif</option>
                                            <option value="1" {{ $d->void == 1 ? 'selected' : '' }}>Tidak Akatif
                                            </option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach

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


            $(document).on('submit', '#form_add_diskon', function(event) {
                $('#btn_add_diskon').attr('disabled', true);
                $('#btn_add_diskon').html('Loading...');

            });

        });
    </script>
@endsection
@endsection
