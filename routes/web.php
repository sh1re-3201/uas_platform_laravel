<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function (): View {
    return view('register'); 
});
Route::post('/register', [AuthController::class, 'register']);



