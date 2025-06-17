<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\ProfileAdminController;
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




;

Route::get('/riwayatApply', function () {
    return view('riwayatApply');
})->name('riwayat.apply');
Route::get('/cek', function () {
    return view('editProfile');
})->name('edit.profile');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [ProfileAdminController::class, 'show'])->name('admin.profile');
    Route::get('/admin/profile/edit', [ProfileAdminController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [ProfileAdminController::class, 'update'])->name('admin.profile.update');
});


Route::get('/register', [registerController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [registerController::class, 'register'])->name('register');
