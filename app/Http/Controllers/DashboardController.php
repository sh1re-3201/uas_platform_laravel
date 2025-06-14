<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListings;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        // Pagination settings
        $perPage = 5;

        // Query jobs dari database dengan scope aktif & belum expired
        $jobs = JobListings::active()
                   ->notExpired()
                   ->orderBy('created_at', 'desc')
                   ->paginate($perPage);

        // Data pagination untuk view
        $pagination = [
            'current_page' => $jobs->currentPage(),
            'total_pages' => $jobs->lastPage(),
            'per_page' => $jobs->perPage(),
            'total_jobs' => $jobs->total(),
            'has_prev' => !$jobs->onFirstPage(),
            'has_next' => $jobs->hasMorePages(),
            'prev_page' => $jobs->currentPage() - 1,
            'next_page' => $jobs->currentPage() + 1,
            'from' => $jobs->firstItem(),
            'to' => $jobs->lastItem()
        ];

        return view('dashboard.dashboard', compact('user', 'jobs', 'pagination'));
    }
}
