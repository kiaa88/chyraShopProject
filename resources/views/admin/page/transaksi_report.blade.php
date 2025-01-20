@extends('admin.layout.index')

@section('content')
<title>@yield('title', 'Product Report')</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container mt-4">
    <h3 class="mb-4 text-dark" style="font-family: 'Poppins', sans-serif;">{{ $title }}</h3>
    <div class="table-container" style="background-color: #f5f5dc; border-radius: 10px; padding: 20px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <table class="table table-bordered table-hover text-center" style="background-color: #fff;">
            <thead style="background-color: #d2b48c; color: #000;">
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Nama Produk</th>
                    <th>Quantity</th>
                    <th>Total Harga</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $index => $trx)
                    <tr style="background-color: #fff; color: #4a4a4a;">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $trx->nama_customer }}</td>   
                        <td>
                          @foreach($trx->detailTransaksi as $detail)
                            @if($detail->product)
                            <div>{{ $detail->product->nama_product }}</div>
                            @else
                            <div>Product Not Found</div>
                            @endif
                           @endforeach
                        </td>
                        <td>{{ $trx->total_qty }}</td>
                        <td>Rp{{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                        <td>{{ date('d-m-Y', strtotime($trx->tanggal_transaksi)) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada data transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
