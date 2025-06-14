<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListings;

class CareerController extends Controller
{
    /**
     * Menampilkan daftar pekerjaan aktif ke halaman career
     */
    public function index()
    {
        // Ambil data pekerjaan yang masih aktif, 6 per halaman
        $jobs = JobListings::where('status', 'active')
                   ->orderBy('created_at', 'desc')
                   ->paginate(6);

        return view('career', compact('jobs'));
    }

    /**
     * Menampilkan detail pekerjaan berdasarkan ID (digunakan di AJAX/modal)
     */
    public function show($id)
    {
        $job = JobListings::findOrFail($id);
        return response()->json($job);
    }
}
