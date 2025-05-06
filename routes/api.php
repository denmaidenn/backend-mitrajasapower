<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceControllerAPI;
use App\Http\Controllers\API\TestimonialControllerAPI;
use App\Http\Controllers\API\PusatBantuanControllerAPI;
use App\Http\Controllers\API\GalleryControllerAPI;
use App\Http\Controllers\Api\PengirimanControllerAPI;

// API Website
Route::apiResource('services', ServiceControllerAPI::class);
Route::apiResource('testimonials', TestimonialControllerAPI::class);
Route::apiResource('pusatbantuan', PusatBantuanControllerAPI::class);
Route::apiResource('gallery', GalleryControllerAPI::class);

// Peta Pengiriman
Route::apiResource('pengiriman', PengirimanControllerAPI::class);
