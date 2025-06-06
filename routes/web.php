<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


Route::get('/', [AuthController::class, 'showLoginForm']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login-action', [AuthController::class, 'login'])->name('actionlogin');

Route::get('/dashboard', [DashboardController::class, 'showDashboard']);

use Illuminate\View\View;

Route::get('/', function () {
    return view('auth.login');
});
Route::post('/register', [AuthController::class, 'register']);



