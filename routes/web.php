<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileUserController;
use Illuminate\View\View;

//Halaman Login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login-action', [AuthController::class, 'login'])->name('actionlogin');

//Register
Route::post('/register', [AuthController::class, 'register']);

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard']);

//Profile User
Route::get('/showProfileUser', [ProfileUserController::class, 'showProfileUser'])->name('profile.show');
Route::get('/editProfileUser', [ProfileUserController::class, 'editProfileUser'])->name('profile.edit');
Route::post('/updateProfileUser', [ProfileUserController::class, 'updateProfileUser'])->name('profile.update');

Route::get('/', function () {
    return view('auth.login');
});





