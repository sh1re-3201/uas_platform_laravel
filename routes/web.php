<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HRDController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ControllerStatusLamaran;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ----------------------------
// HALAMAN AWAL / AUTH
// ----------------------------

// Halaman utama redirect ke login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'actionLogin'])->name('actionlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman register
Route::get('/register', [registerController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [registerController::class, 'register']);


// ----------------------------
// AREA USER BIASA
// ----------------------------
Route::middleware(['auth'])->group(function () {
    // Dashboard user
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/showProfileUser', [ProfileUserController::class, 'showProfileUser'])->name('profile.show');
    Route::get('/editProfileUser', [ProfileUserController::class, 'editProfileUser'])->name('profile.edit');
    Route::post('/updateProfileUser', [ProfileUserController::class, 'updateProfileUser'])->name('profile.update');

    // Halaman tambahan
    Route::get('/editProfile', function () {
        return view('editProfile');
    })->name('edit.profile');

    Route::get('/riwayatApply', function () {
        return view('riwayatApply');
    })->name('riwayat.apply');

    // Apply Lamaran Kerja
    Route::post('/apply/{job}', [JobApplicationController::class, 'store'])->name('jobs.apply');

    // Riwayat Lamaran - dari ControllerStatusLamaran
    Route::get('/riwayat-lamaran', [ControllerStatusLamaran::class, 'indexUser'])->name('user.riwayatLamaran');
});


// ----------------------------
// AREA HRD
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

    // Profile HRD
    Route::get('/profile', [ProfileAdminController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileAdminController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileAdminController::class, 'update'])->name('profile.update');

    // Manajemen Pelamar
    Route::get('/applicants', [HRDController::class, 'applicants'])->name('applicants');
    Route::get('/applicants/{id}', [HRDController::class, 'applicantDetail'])->name('applicants.detail');

    // Status Lamaran - dari ControllerStatusLamaran
    Route::get('/lamaran', [ControllerStatusLamaran::class, 'indexHRD'])->name('lamaran.index');
    Route::post('/lamaran/{id}/update', [ControllerStatusLamaran::class, 'updateStatus'])->name('lamaran.update');
});
