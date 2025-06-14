<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobListings;
use App\Models\Application;
use App\Models\JobType;

class HRDController extends Controller
{
    // Tampilkan dashboard HRD
    public function dashboard()
    {
        $jobCount = JobListings::count();
        $applicantCount = Application::count();

        return view('hrd.dashboard', compact('jobCount', 'applicantCount'));
    }

    // List semua pekerjaan dengan filter sorting deadline
    public function jobs(Request $request)
    {
        $sortOrder = $request->input('sort');

        $jobs = JobListings::with('jobType');

        if ($sortOrder === 'asc') {
            $jobs = $jobs->orderBy('deadline', 'asc');
        } elseif ($sortOrder === 'desc') {
            $jobs = $jobs->orderBy('deadline', 'desc');
        }

        $jobs = $jobs->get();

        return view('hrd.jobs.index', compact('jobs'));
    }

    // Form untuk membuat pekerjaan baru
    public function createJob()
    {
        $types = JobType::all();
        return view('hrd.jobs.create', compact('types'));
    }

    // Simpan pekerjaan baru
    public function storeJob(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'location' => 'nullable|string',
            'employment_type' => 'nullable|string',
            'deadline' => 'nullable|date',
            'job_type_id' => 'nullable|exists:job_types,id',
        ]);

        $validated['qualifications'] = $request->filled('qualifications_input')
            ? array_map('trim', explode(',', $request->qualifications_input))
            : [];

        $validated['requirements'] = $request->filled('requirements_input')
            ? array_map('trim', explode(',', $request->requirements_input))
            : [];

        JobListings::create($validated);

        return redirect()->route('hrd.jobs')->with('success', 'Pekerjaan berhasil ditambahkan.');
    }

    // Form edit pekerjaan
    public function editJob($id)
    {
        $job = JobListings::findOrFail($id);
        $types = JobType::all();

        return view('hrd.jobs.edit', compact('job', 'types'));
    }

    // Update pekerjaan
    public function updateJob(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'location' => 'nullable|string',
            'employment_type' => 'nullable|string',
            'deadline' => 'nullable|date',
            'job_type_id' => 'nullable|exists:job_types,id',
        ]);

        $validated['qualifications'] = $request->filled('qualifications_input')
            ? array_map('trim', explode(',', $request->qualifications_input))
            : [];

        $validated['requirements'] = $request->filled('requirements_input')
            ? array_map('trim', explode(',', $request->requirements_input))
            : [];

        $job = JobListings::findOrFail($id);
        $job->update($validated);

        return redirect()->route('hrd.jobs')->with('success', 'Pekerjaan berhasil diperbarui.');
    }

    // Hapus pekerjaan
    public function deleteJob($id)
    {
        $job = JobListings::findOrFail($id);
        $job->delete();

        return redirect()->route('hrd.jobs')->with('success', 'Pekerjaan berhasil dihapus.');
    }

    // Menampilkan daftar pelamar
    public function applicants()
    {
        $applications = Application::with('user', 'job')->get();
        return view('hrd.applicants.index', compact('applications'));
    }

    // Detail pelamar
    public function applicantDetail($id)
    {
        $application = Application::with('user', 'job')->findOrFail($id);
        return view('hrd.applicants.detail', compact('application'));
    }
}
