@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($barang)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID</th>
                        <td>{{ $barang->barang_id }}</td>
                    </tr>
                    <tr>
                        <th>Kode barang</th>
                        <td>{{ $barang->barang_kode }}</td>
                    </tr>
                    <tr>
                        <th>Harga jual</th>
                        <td id="harga_jual">{{ $barang->harga_jual }}</td>
                    </tr>
                    <tr>
                        <th>Harga beli</th>
                        <td id="harga_beli">{{ $barang->harga_beli }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{$barang->kategori->kategori_nama}}</td>
                    </tr>
                </table>
            @endempty
        <a href="{{ url('barang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection
@push('css')
@endpush
@push('js')
<script>
    function formatRupiah(angka) {
            let numberString = angka.toString();
            let sisa = numberString.length % 3;
            let rupiah = numberString.substr(0, sisa);
            let ribuan = numberString.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return 'Rp ' + rupiah;
        }
        $(document).ready(function() {
            // Dapatkan nilai harga jual dan harga beli dari td
            let hargaJual = $('#harga_jual').text();
            let hargaBeli = $('#harga_beli').text();

            // Gantikan dengan format rupiah
            $('#harga_jual').text(formatRupiah(hargaJual));
            $('#harga_beli').text(formatRupiah(hargaBeli));
        });
</script>
@endpush