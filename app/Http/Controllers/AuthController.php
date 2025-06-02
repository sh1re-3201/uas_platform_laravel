<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Hanya untuk tampilkan input, validasi sederhana (tanpa cek database)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Simulasi login berhasil
        if ($request->email == 'admin@example.com' && $request->password == 'admin_p4ss') {
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}
