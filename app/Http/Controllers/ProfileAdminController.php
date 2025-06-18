<?php

namespace App\Http\Controllers;
   use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;

class ProfileAdminController extends Controller
{
    public function show()
{
    $user = Users::find(Auth::id()); // ambil user berdasarkan id yang sedang login


    return view('editProfile', compact('user'));
}

    public function edit()
    {
         $user = Users::find(Auth::id()); // ambil user berdasarkan id yang sedang login

       return view('editProfile', compact('user'));

    }

public function update(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal_lahir' => 'nullable|date',
        'pendidikan_terakhir' => 'nullable|string|max:255',
        'pengalaman_kerja' => 'nullable|string|max:255',
        'skills' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:8|confirmed',
    ], [
        'nama.required' => 'Nama lengkap wajib diisi.',
        'password.min' => 'Kata sandi harus minimal 8 karakter.',
        'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
    ]);

    $user = Users::find(Auth::id());

    $user->name = $request->nama;
    $user->tanggal_lahir = $request->tanggal_lahir;
    $user->pendidikan_terakhir = $request->pendidikan_terakhir;
    $user->pengalaman_kerja = $request->pengalaman_kerja;
    $user->skills = $request->skills;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('admin.profile.edit')->with('success', 'Profil berhasil diperbarui.');
}


}
