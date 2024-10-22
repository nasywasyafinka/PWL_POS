@extends('layouts.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a href="{{ url('/transaksi/export_excel') }}" class="btn btn-sm btn-primary mt-1">
                    <i class="fa fa-file-excel"></i> Export Penjualan
                </a>
                <a href="{{ url('/transaksi/export_pdf') }}" class="btn btn-sm btn-warning mt-1">
                    <i class="fa fa-file-pdf"></i>Export Penjualan
                </a>
                <button onclick="modalAction('{{ url('transaksi/create_ajax') }}')" class="btn btn-sm btn-success mt-1">
                    Tambah Penjualan
                </button>
            </div>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter</label>

                        <!-- Filter Nama User -->
                        <div class="col-3">
                            <select class="form-control" id="user_id" name="user_id">
                                <option value="">- Semua -</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Nama User</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penjualan Kode</th>
                            <th>Pembuat</th>
                            <th>Pembeli</th>
                            <th>Tanggal Penjualan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }

        $(document).ready(function() {
            // Inisialisasi DataTables
            var dataPenjualan = $('#table_penjualan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('transaksi/list') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function(d) {
                        d.user_id = $('#user_id').val(); // Filter berdasarkan User ID
                    }
                },
                columns: [
                    { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                    { data: "penjualan_kode", className: "", orderable: true, searchable: true },
                    { data: "user.nama", className: "", orderable: true, searchable: true },
                    { data: "pembeli", className: "", orderable: true, searchable: true },
                    { data: "penjualan_tanggal", className: "", orderable: true, searchable: true },
                    { data: "aksi", className: "text-center", orderable: false, searchable: false }
                ]
            });

            // Reload DataTable saat filter diubah
            $('#user_id').on('change', function() {
                dataPenjualan.ajax.reload();
            });
        });
    </script>
@endpush