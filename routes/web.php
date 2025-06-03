<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Tampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

// Proses login (DIPERBAIKI!)
Route::post('/login', [AuthController::class, 'actionLogin'])->name('actionlogin');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Arahkan root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

