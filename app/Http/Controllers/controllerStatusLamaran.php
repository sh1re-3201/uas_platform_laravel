<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\JobListing;

class ControllerStatusLamaran extends Controller
{
    // Halaman HRD: daftar pelamar untuk pekerjaan mereka
    public function indexHRD()
    {
        if (Auth::user()->role !== 'hrd') {
            abort(403);
        }

        $applications = Application::with(['user', 'job'])
            ->whereHas('job', function ($query) {
                $query->where('status', 'active');
            })
            ->get();

        return view('hrd.applicants.index', compact('applications'));
    }

    // Halaman User: riwayat lamaran yang sudah dibuat
    public function indexUser()
    {
        if (Auth::user()->role !== 'user') {
            abort(403);
        }

        $riwayatLamaran = Application::with(['jobListing.jobType'])
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($app) {
                // FIXED: Perbandingan status pakai string casting agar konsisten
                $app->status = match ((string) $app->application_status) {
                    '1' => 'Diterima',
                    '0' => 'Ditolak',
                    default => 'Menunggu'
                };
                return $app;
            });

        return view('profile.riwayatLamaranUser', compact('riwayatLamaran'));
    }

    // HRD update status lamaran
    public function updateStatus(Request $request, $id)
    {
        if (Auth::user()->role !== 'hrd') {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:0,1',
        ]);

        $application = Application::findOrFail($id);

        // Pastikan nilai disimpan dalam bentuk boolean
        $application->application_status = $request->status == '1';

        $application->save();

        return redirect()->back()->with('success', 'Status lamaran berhasil diperbarui.');
    }
}
