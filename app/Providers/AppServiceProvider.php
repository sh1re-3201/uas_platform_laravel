<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsHRD;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Daftarkan middleware kustom
        Route::middleware('is_hrd', IsHRD::class);
    }
}
