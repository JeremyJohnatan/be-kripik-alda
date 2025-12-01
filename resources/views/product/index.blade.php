@extends('layouts.app')

@section('content')
<div class="ml-1 mb-4">
    <h1 class="fw-bold">Produk</h1>
</div>

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">

    <!-- Category -->
    <div class="d-flex gap-2">
        <a href="{{ route('product.index') }}"
        class="btn-sm btn-success-subtle {{ !$kategori ? 'active' : '' }}">
        Semua
        </a>

        <a href="{{ route('product.index', ['kategori' => 'Original']) }}"
        class="btn-sm btn-success-subtle {{ $kategori == 'Original' ? 'active' : '' }}">
        Original
        </a>

        <a href="{{ route('product.index', ['kategori' => 'BBQ']) }}"
        class="btn-sm btn-success-subtle {{ $kategori == 'BBQ' ? 'active' : '' }}">
        BBQ
        </a>

        <a href="{{ route('product.index', ['kategori' => 'Ayam Panggang']) }}"
        class="btn-sm btn-success-subtle {{ $kategori == 'Ayam Panggang' ? 'active' : '' }}">
        Ayam Panggang
        </a>

        <a href="{{ route('product.index', ['kategori' => 'Pedas']) }}"
        class="btn-sm btn-success-subtle {{ $kategori == 'Pedas' ? 'active' : '' }}">
        Pedas
        </a>

        <a href="{{ route('product.index', ['kategori' => 'Balado']) }}"
        class="btn-sm btn-success-subtle {{ $kategori == 'Balado' ? 'active' : '' }}">
        Balado
        </a>
    </div>

    <!-- Action -->
    <div class="d-flex gap-2">
        <a href="#" class="btn-success d-flex align-items-center p-2 gap-2">
            <img src="{{ asset('assets\img\icons\material-symbols_save-rounded.svg') }}" alt=""> Simpan Perubahan
        </a>
        <a href="{{ route('product.create') }}" class="btn-success d-flex align-items-center p-2 gap-2">
            <img src="{{ asset('assets\img\icons\mdi_box-plus.svg') }}" alt="">  Tambah Produk
        </a>
    </div>
</div>

<!-- Product Card -->
 <div class="row g-3">

    @foreach($products as $product)
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card shadow-sm h-100 p-3 d-flex flex-row align-items-stretch gap-3" style="border-radius: 25px;">

            @php
                $gambar = $product->gambar;
                $isFullUrl = $gambar && Str::startsWith($gambar, ['http://','https://']);
                $src = $gambar
                    ? ($isFullUrl ? $gambar : asset('storage/'.$gambar))
                    : 'https://placehold.co/80x80?text=No+Image';
            @endphp
            <img src="{{ $src }}" alt="Gambar {{ $product->name }}"
                    class="rounded"
                    style="width: 84px; height: 126px; object-fit: cover">

            <div class="d-flex flex-column justify-content-between w-100">
                <div>
                    <h6 class="fw-bold">{{ $product->nama_produk }}</h6>
                    <small>
                        @php
                            $berat = $product->deskripsi;

                            if ($berat < 1000) {
                                echo $berat . ' Gram';
                            } else {
                                echo number_format($berat / 1000, 2, ',', '.') . ' KG';
                            }
                        @endphp
                    </small>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-2">
                    <h4 class="fw-bold fs-5">Rp {{ number_format($product->harga, 0, ',', '.') }} </h4>
                    <a href="{{ route('product.edit', $product->id_produk) }}" class="btn btn-sm btn-dark">
                        <i class="fas fa-pen"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
@endsection
