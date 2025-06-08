<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job; // Assuming you have a Job model

class CareerController extends Controller
{
    public function index()
    {
        // Get jobs with pagination (6 jobs per page)
        $jobs = Job::where('status', 'active')
                   ->orderBy('created_at', 'desc')
                   ->paginate(6);
        
        return view('career', compact('jobs'));
    }
    
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return response()->json($job);
    }
}