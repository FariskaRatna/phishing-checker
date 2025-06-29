<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhishingController;
use Illuminate\Support\Facades\Route;



Route::get('/phishing', [PhishingController::class, 'index']);
Route::post('/phishing/check', [PhishingController::class, 'check']);



Route::get('/home', function () {
    return view('main.home');
});

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
