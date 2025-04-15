<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/website/gallery', function () {
    return view('website.gallery');
});

Route::get('/website/layanan', function () {
    return view('website.layanan');
});

Route::get('/website/pusatbantuan', function () {
    return view('website.pusatbantuan');
});

Route::get('/website/testimonial', function () {
    return view('website.testimonial');
});