<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhishingController;
use Illuminate\Support\Facades\Route;



Route::get('/phishing', [PhishingController::class, 'index2']);
Route::post('/phishing/check', [PhishingController::class, 'check']);

Route::get('/documentation', function () {
    return view('main.documentation');
});

Route::get('/about-us', function () {
    return view('main.about');
});

Route::get('/2', [PhishingController::class, 'index']);

//Perbatasan 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
