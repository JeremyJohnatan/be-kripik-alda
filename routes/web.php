<?php
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/cetak/pdf', [DashboardController::class, 'cetakPdf'])->name('dashboard.cetak.pdf');

    Route::get('/get-insight', [GeminiController::class, 'getInsight'])->name('get.insight');

    Route::delete('/product/mass-delete', [ProductController::class, 'massDelete'])->name('product.massDelete');
    Route::resource('product', ProductController::class)->names('product');

    Route::resource('pesanan', PesananController::class)->names('pesanan');
    Route::get('/pesanan/cetak/pdf', [PesananController::class, 'cetakPdf'])->name('pesanan.cetak.pdf');

    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/add/{id}', [KeranjangController::class, 'add'])->name('keranjang.add');
    Route::delete('/keranjang/hapus',   [KeranjangController::class, 'deleteAll'])->name('keranjang.delete');
    Route::post('/keranjang/update/{id}', [KeranjangController::class, 'updateQty']);
    Route::delete('/keranjang/delete/{id}', [KeranjangController::class, 'deleteItem']);

    Route::post('/checkout', [TransaksiController::class, 'checkout'])->name('checkout');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
