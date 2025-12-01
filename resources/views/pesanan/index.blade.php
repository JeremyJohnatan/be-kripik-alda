@extends('layouts.app')

@section('content')
<div class="ml-1 mb-4">
    <h1 class="fw-bold">Pesanan</h1>
</div>

<div class="d-flex h-100 flex-wrap card shadow-sm px-4" style="border-radius: 35px;">
    <div class="m-0 ms-2 me-4">
        <div class="d-flex justify-content-end">
        <a href="{{ route('pesanan.cetak.pdf') }}" class="btn-success d-flex align-items-center p-2 gap-2">
            <img src="{{ asset('assets/img/icons/lets-icons_paper-fill.svg') }}" alt=""> Cetak Laporan
        </a>
    </div>

    <div class="sub-title mt-0">
        <h2>Pesanan</h2>
    </div>

    <div class="table mt-4">
        <table class="table mb-4">
            <thead class="border-top border-bottom border-dark">
                <tr>
                    <th class="fw-semibold py-3 text-start">Nama Produk</th>
                    <th class="fw-semibold py-3 text-center">Jumlah</th>
                    <th class="fw-semibold py-3 text-center">Alamat</th>
                    <th class="fw-semibold py-3 text-center">Status Pembayaran</th>
                    <th class="fw-semibold py-3 text-end">Status Pengiriman</th>
                </tr>
            </thead>

            <tbody>
                @foreach($transaksi as $t)
                    @foreach($t->detail as $d)
                    <tr>
                        <td class="fw-semibold py-3 text-start">{{ $d->product->nama_produk }}</td>
                        <td class="fw-semibold py-3 text-center">{{ $d->total_jumlah }}</td>
                        <td class="fw-semibold py-3 text-center">Alamat</td>
                        <td class="fw-semibold py-3 text-center">{{ $t->status_pembayaran }}</td>
                        <td class="fw-semibold py-3 text-end">Status Pengiriman</td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

@endsection
