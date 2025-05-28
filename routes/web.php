<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

// Redirect root to home if authenticated, otherwise to login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

Auth::routes(['verify' => false]);

// Home/Dashboard route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'doctors' => DoctorController::class,
        'patients' => PatientController::class,
    ]);
});
