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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tanggal_lahir' => 'required|date',
            'pendidikan_terakhir' => 'required|string',
            'pengalaman_kerja' => 'required|string',
            'skills' => 'required|string',
        ]);

        // Update data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pengalaman_kerja' => $request->pengalaman_kerja,
            'skills' => $request->skills,
        ]);

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
