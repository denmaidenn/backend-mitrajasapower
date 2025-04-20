<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PusatBantuanController;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

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

        // Route untuk testimonial
        Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
        Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
        Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get('/testimonial/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::put('/testimonial/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::delete('/testimonial/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');

        // Route untuk pusat bantuan
        Route::get('/pusatbantuan', [PusatBantuanController::class, 'index'])->name('pusatbantuan');
        Route::get('/pusatbantuan/create', [PusatBantuanController::class, 'create'])->name('pusatbantuan.create');
        Route::post('/pusatbantuan', [PusatBantuanController::class, 'store'])->name('pusatbantuan.store');
        Route::get('/pusatbantuan/{id}/edit', [PusatBantuanController::class, 'edit'])->name('pusatbantuan.edit');
        Route::put('/pusatbantuan/{id}', [PusatBantuanController::class, 'update'])->name('pusatbantuan.update');
        Route::delete('/pusatbantuan/{id}', [PusatBantuanController::class, 'destroy'])->name('pusatbantuan.destroy');
    });
});