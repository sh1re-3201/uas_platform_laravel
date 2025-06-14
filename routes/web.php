<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HRDController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ----------------------------
// AUTH AREA
// ----------------------------

// Halaman login (default redirect ke login)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm']);

// Proses login
Route::post('/login', [AuthController::class, 'actionLogin'])->name('actionlogin');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register (jika ada fitur register)
if (class_exists(AuthController::class) && method_exists(AuthController::class, 'register')) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
}


// ----------------------------
// USER DASHBOARD (USER BIASA)
// ----------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// ----------------------------
// HRD AREA (KHUSUS UNTUK ROLE HRD)
// ----------------------------
Route::middleware(['auth', 'is_hrd'])->prefix('hrd')->name('hrd.')->group(function () {

    // Dashboard HRD
    Route::get('/dashboard', [HRDController::class, 'dashboard'])->name('dashboard');

    // Manajemen Pekerjaan
    Route::get('/jobs', [HRDController::class, 'jobs'])->name('jobs');
    Route::get('/jobs/create', [HRDController::class, 'createJob'])->name('jobs.create');
    Route::post('/jobs/store', [HRDController::class, 'storeJob'])->name('jobs.store');
    Route::get('/jobs/{id}/edit', [HRDController::class, 'editJob'])->name('jobs.edit');
    Route::put('/jobs/{id}', [HRDController::class, 'updateJob'])->name('jobs.update');
    Route::delete('/jobs/{id}', [HRDController::class, 'deleteJob'])->name('jobs.delete');

    // Manajemen Pelamar
    Route::get('/applicants', [HRDController::class, 'applicants'])->name('applicants');
    Route::get('/applicants/{id}', [HRDController::class, 'applicantDetail'])->name('applicants.detail');
});
