<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhishingController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/product');
});

Route::get('/phishing', [PhishingController::class, 'index']);
Route::post('/phishing/check', [PhishingController::class, 'check']);
Route::get('/product', [ProductController::class, 'index']);
