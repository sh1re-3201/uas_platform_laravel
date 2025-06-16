<?php

// app/Http/Middleware/IsHRD.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsHRD
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'hrd') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Akses hanya untuk HRD.');
    }
}
