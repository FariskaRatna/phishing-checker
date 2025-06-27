<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhishingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/phishing', [PhishingController::class, 'index']);
Route::post('/phishing/check', [PhishingController::class, 'check']);
