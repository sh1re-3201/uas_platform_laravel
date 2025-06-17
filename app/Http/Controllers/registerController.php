<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Validation\ValidationException;

class registerController extends Controller
{

    public function showRegisterForm()
    {
        return view('register');
    }
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|confirmed|min:6',
    ], [
        'name.required' => 'Nama lengkap wajib diisi.',
        'email.required' => 'Alamat email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'password.required' => 'Kata sandi wajib diisi.',
        'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        'password.min' => 'Kata sandi minimal 6 karakter.',
    ]);

    Users::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', // default
        'tanggal_lahir' => '0000-01-01',
        'pendidikan_terakhir' => 'Tidak ada',
        'pengalaman_kerja' => 'Tidak ada',
        'skills' => 'Tidak ada',
    ]);

    return back()->with('success', 'Registrasi berhasil. Silakan login.');
}


}

