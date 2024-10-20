{{-- @extends('layouts.template') @section('content') <div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">{{ $page->title }}</h3>
		<div class="card-tools">
			<a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
			<button onclick="modalAction('{{ url('barang/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
		</div>
	</div>
	<div class="card-body">
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
                <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" name="kategori_id" id="kategori_id" required>
                            <option value="">- Semua -</option>
                            @foreach ($kategori as $item )
                            <option value="{{$item->kategori_id}}">{{ $item->kategori_nama}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori Barang</small>
                    </div>
				</div>
			</div>
		</div>
		<table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
			<thead>
				<tr>
					<th>ID</th>
					<th>Kategori
						Barang</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>Harga Beli</th>
					<th>Harga Jual</th>
					<th>Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
</div> 
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" 
data-backdrop="static" data-keyboard="false" data-width="75%" aria-hidden="true"></div>
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
		var dataBarang;

		$(document).ready(function() {
		dataBarang = $('#table_barang').DataTable({
			// serverSide: true, jika ingin menggunakan server side processing
			serverSide: true,
			ajax: {
				"url": "{{ url('barang/list') }}",
				"dataType": "json",
				"type": "POST",
				"data": function (d){
					d.kategori_id = $('#kategori_id').val();
				}
			},
			columns: [{ // nomor urut dari laravel datatable addIndexColumn()
				data: "DT_RowIndex",
				className: "text-center",
				orderable: false,
				searchable: false
			}, {
				// mengambil data kategori hasil dari ORM berelasi
				data: "kategori.kategori_nama",
				className: "",
				orderable: false,
				searchable: false
			}, {
				data: "barang_kode",
				className: "",
				// orderable: true, jika ingin kolom ini bisa diurutkan
				orderable: true,
				// searchable: true, jika ingin kolom ini bisa dicari
				searchable: true
			}, {
				data: "barang_nama",
				className: "",
				orderable: true,
				searchable: true
			}, {
				data: "harga_beli",
				className: "",
				orderable: true,
				searchable: true
			}, {
				data: "harga_jual",
				className: "",
				orderable: true,
				searchable: true
			}, {
				data: "aksi",
				className: "",
				orderable: false,
				searchable: false
			}]
		});
		$('#kategori_id').on('change', function(){
                dataBarang.ajax.reload();
            });
	});
</script> @endpush --}}

{{-- Jobsheet 8 --}}
@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Barang</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/barang/import') }}')" class="btn btn-info">Import Barang</button>
            <a href="{{ url('/barang/export_excel') }}" class="btn btn-primary"><i class="fa fa-file-excel"></i> Export Barang</a> 
            {{-- export pdf --}}
            <a href="{{ url('/barang/export_pdf') }}" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Export Barang</a>
            <button onclick="modalAction('{{ url('/barang/create_ajax') }}')" class="btn btn-success">Tambah Data (Ajax)</button>
        </div>
    </div>
    <div class="card-body">
        <!-- Filter data -->
        <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-sm row text-sm mb-0">
                        <label for="filter_date" class="col-md-1 col-form-label">Filter</label>
                        <div class="col-md-3">
                            <select name="filter_kategori" class="form-control form-control-sm filter_kategori">
                                <option value="">- Semua -</option>
                                @foreach($kategori as $l)
                                    <option value="{{ $l->kategori_id }}">{{ $l->kategori_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Barang</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered table-sm table-striped table-hover" id="table-barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>
@endsection

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var tableBarang;
    $(document).ready(function() {
        tableBarang = $('#table-barang').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('barang/list') }}",
                dataType: "json",
                type: "POST",
                data: function(d) {
                    d.filter_kategori = $('.filter_kategori').val();
                }
            },
            columns: [
                { data: "barang_id", className: "text-center", width: "5%", orderable: false, searchable: false },
                { data: "barang_kode", width: "10%", orderable: true, searchable: true },
                { data: "barang_nama", width: "37%", orderable: true, searchable: true },
                {
                    data: "harga_beli", width: "10%", orderable: true, searchable: false,
                    render: function(data, type, row) {
                        return new Intl.NumberFormat('id-ID').format(data);
                    }
                },
                {
                    data: "harga_jual", width: "10%", orderable: true, searchable: false,
                    render: function(data, type, row) {
                        return new Intl.NumberFormat('id-ID').format(data);
                    }
                },
                { data: "kategori.kategori_nama", width: "14%", orderable: true, searchable: false },
                { data: "aksi", className: "text-center", width: "14%", orderable: false, searchable: false }
            ]
        });

        $('#table-barang_filter input').unbind().bind('keyup', function(e) {
            if(e.keyCode == 13) { // enter key
                tableBarang.search(this.value).draw();
            }
        });

        $('.filter_kategori').change(function() {
            tableBarang.draw();
        });
    });
</script>
@endpush
