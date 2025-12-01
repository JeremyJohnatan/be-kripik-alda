<html>
<head>
    <title>Cetak Laporan Pesanan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 8px; }
    </style>
</head>
<body>

<h2>Laporan Pesanan</h2>

<table>
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Alamat</th>
            <th>Status Pembayaran</th>
            <th>Status Pengiriman</th>
        </tr>
    </thead>

    <tbody>
        @foreach($transaksi as $t)
            @foreach($t->detail as $d)
            <tr>
                <td>{{ $d->product->nama_produk }}</td>
                <td>{{ $d->total_jumlah }}</td>
                <td>alamat</td>
                <td>{{ $t->status_pembayaran }}</td>
                <td>status pengiriman</td>
            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

<script>
    window.print();
</script>

</body>
</html>
