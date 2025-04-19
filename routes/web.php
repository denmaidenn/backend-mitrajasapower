<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/pemasukkan', function () {
    return view('pemasukkan.pemasukkan');
});

Route::get('/pengeluaran', function () {
    return view('pengeluaran.pengeluaran');
});

Route::get('/pengiriman', function () {
    return view('pengiriman.pengiriman');
});

Route::prefix('website')->name('website.')->group(function () {
    // Route untuk layanan
    Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan');
    Route::get('/layanan/create', [ServiceController::class, 'create'])->name('layanan.create');
    Route::post('/layanan', [ServiceController::class, 'store'])->name('layanan.store');
    Route::get('/layanan/{service}/edit', [ServiceController::class, 'edit'])->name('layanan.edit');
    Route::put('/layanan/{service}', [ServiceController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{service}', [ServiceController::class, 'destroy'])->name('layanan.destroy');

    // Route untuk gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Route untuk halaman lain
    Route::get('/pusatbantuan', function () {
        return view('website.pusatbantuan');
    })->name('pusatbantuan');
    
    Route::get('/testimonial', function () {
        return view('website.testimonial');
    })->name('testimonial');
});