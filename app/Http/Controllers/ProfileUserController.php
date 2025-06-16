<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{

    public function showProfileUser()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('profile.showProfileUser', compact('user'));
    }

    public function editProfileUser()
    {
        $user = Auth::user();
   
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('profile.editProfileUser', compact('user'));
    }

    public function updateProfileUser(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'tanggal_lahir' => 'required|date',
        'pendidikan' => 'required|string',
        'pengalaman' => 'required|string',
        'skills' => 'required|string',
    ]);

    // Update data
    $user->update([
        'name' => $request->nama,
        'email' => $request->email,
        'tanggal_lahir' => $request->tanggal_lahir,
        'pendidikan_terakhir' => $request->pendidikan,
        'pengalaman_kerja' => $request->pengalaman,
        'skills' => $request->skills,
    ]);

    return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
}

}