@extends('admin.layout.index')

@section('content')
<title>{{ $title ?? 'Laporan Produk' }}</title>

<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<div class="container mt-4">
    <h3 class="mb-4 text-dark" style="font-family: 'Poppins', sans-serif;">{{ $title }}</h3>
    <div class="table-container" style="background-color: #f5f5dc; border-radius: 10px; padding: 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <table id="productTable" class="table table-bordered table-hover text-center" style="background-color: #fff;">
            <thead style="background-color: #d2b48c; color: #000;">
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>SKU</th>
                    <th>Nama Produk</th>
                    <th>Tipe</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#productTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.report.data') }}", 
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, 
                { data: 'id', name: 'id' }, 
                { data: 'sku', name: 'sku' }, 
                { data: 'nama_product', name: 'nama_product' }, 
                { data: 'type', name: 'type' }, 
                { data: 'kategory', name: 'kategory' }, 
                { data: 'harga', name: 'harga' }, 
                { data: 'discount', name: 'discount' }, 
                { data: 'quantity', name: 'quantity' }
            ],
        });
    });
</script>
@endsection
