<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JobListings;
use App\Models\Application;

class JobApplicationController extends Controller
{
    public function store(JobListings $job)
    {
        $user = Auth::user();

        // ✅ Cek kelengkapan profil (tanpa cv_path)
        if (
            empty($user->tanggal_lahir) ||
            empty($user->pendidikan_terakhir) ||
            empty($user->pengalaman_kerja) ||
            empty($user->skills)
        ) {
            return redirect()->route('profile.edit')
                ->with('error', 'Lengkapi data profil terlebih dahulu sebelum melamar.');
        }

        $alreadyApplied = Application::where('job_id', $job->id)
            ->where('user_id', $user->id)
            ->exists();

        if ($alreadyApplied) {
            return redirect()->back()->with('warning', 'Kamu sudah melamar pekerjaan ini.');
        }

        Application::create([
            'job_id' => $job->id,
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Lamaran berhasil dikirim!');
    }
}
