<?php

namespace App\Http\Controllers;


use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function actionLogin(Request $request)
    {
        // Hanya untuk tampilkan input, validasi sederhana (tanpa cek database)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = users::where('email', $request->email)->first();
        
        // Simulasi login berhasil
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
        
    }
}
