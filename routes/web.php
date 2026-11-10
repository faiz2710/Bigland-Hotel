<?php

use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Bigland Hotel & Suites
|--------------------------------------------------------------------------
| Seluruh alur reservasi kini terbuka langsung di halaman depan:
| Beranda -> Daftar Produk -> Form Pemesanan -> Riwayat Pemesanan (Tanpa Login)
*/

// 1. Halaman Beranda Utama
Route::view('/', 'home')->name('home');

// 2. Halaman Daftar Produk & Koleksi Kamar (File: resources/views/produk.blade.php)
Route::view('/produk', 'produk')->name('produk');

// 2b. Halaman Detail Produk & Video Tour (File Baru: resources/views/detail-produk.blade.php - TIDAK ada di navbar)
Route::get('/detail-produk/{tipe?}', function ($tipe = null) {
    $tipe = $tipe ?? request('tipe', 'Standar');
    // Normalisasi parameter tipe agar huruf kapital rapi
    $tipe = ucfirst(strtolower($tipe));
    if (!in_array($tipe, ['Standar', 'Deluxe', 'Executif'])) {
        $tipe = 'Standar';
    }
    return view('detail-produk', compact('tipe'));
})->name('detail.produk');

// 3. Halaman Tentang Kami (File Baru: resources/views/tentang-kami.blade.php)
Route::view('/tentang-kami', 'tentang-kami')->name('tentang-kami');

// 4. Halaman Formulir Pemesanan Kamar (Tanpa Login)
Route::get('/pesan', [PemesananController::class, 'index'])->name('form.pesan');
Route::get('/form', function () {
    return redirect()->route('form.pesan');
});
Route::post('/pesan', [PemesananController::class, 'store'])->name('form.store');
Route::post('/form', [PemesananController::class, 'store']);

// 4b. Halaman Invoice / Struk Pemesanan (File Baru: resources/views/invoice.blade.php - TIDAK ada di navbar)
Route::get('/invoice/{id?}', [PemesananController::class, 'invoice'])->name('invoice');

// 5. Halaman Riwayat Pemesanan (Tanpa Login)
Route::get('/riwayat', [PemesananController::class, 'riwayat'])->name('riwayat');
Route::delete('/riwayat/{id}', [PemesananController::class, 'destroy'])->name('riwayat.destroy');

// 6. Redirect rute login, register, dan dashboard agar tidak broken jika diakses langsung
Route::get('/dashboard', function () {
    return redirect()->route('riwayat');
})->name('dashboard');

Route::get('/login', function () {
    return redirect()->route('home');
})->name('login');

Route::get('/register', function () {
    return redirect()->route('home');
})->name('register');
