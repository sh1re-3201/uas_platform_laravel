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
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\registerController;
use Illuminate\View\View;

//Halaman Login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login-action', [AuthController::class, 'login'])->name('actionlogin');

//Register
Route::get('/register', [registerController::class, 'showRegisterForm'])->name('register');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard']);

//Profile User
Route::get('/showProfileUser', [ProfileUserController::class, 'showProfileUser'])->name('profile.show');
Route::get('/editProfileUser', [ProfileUserController::class, 'editProfileUser'])->name('profile.edit');
Route::post('/updateProfileUser', [ProfileUserController::class, 'updateProfileUser'])->name('profile.update');

Route::get('/', function () {
    return view('auth.login');
});




Route::get('/editProfile', function () {
    return view('editProfile');
})->name('edit.profile');

Route::get('/riwayatApply', function () {
    return view('riwayatApply');
})->name('riwayat.apply');



