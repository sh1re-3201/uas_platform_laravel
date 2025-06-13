<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobType;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('jobType')->orderBy('created_at', 'desc')->get();
        return view('hrd.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $types = JobType::all();
        return view('hrd.jobs.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'job_type_id' => 'required|exists:job_types,id',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'deadline' => 'required|date|after:today',
        ]);

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'job_type_id' => $request->job_type_id,
            'location' => $request->location,
            'salary_min' => $request->salary,
            'salary_max' => $request->salary,
            'deadline' => $request->deadline,
            'status' => 'active',
            'employment_type' => 'full-time',
            'qualifications' => $request->input('qualifications', []),
            'requirements' => $request->input('requirements', []),
        ]);

        return redirect()->route('jobs.index')->with('success', 'Pekerjaan berhasil ditambahkan.');
    }

    public function edit(Job $job)
    {
        $types = JobType::all();
        return view('hrd.jobs.edit', compact('job', 'types'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'job_type_id' => 'required|exists:job_types,id',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'deadline' => 'required|date|after:today',
        ]);

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'job_type_id' => $request->job_type_id,
            'location' => $request->location,
            'salary_min' => $request->salary,
            'salary_max' => $request->salary,
            'deadline' => $request->deadline,
            'status' => 'active',
            'employment_type' => 'full-time',
            'qualifications' => $request->input('qualifications', []),
            'requirements' => $request->input('requirements', []),
        ]);

        return redirect()->route('jobs.index')->with('success', 'Pekerjaan berhasil diperbarui.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Pekerjaan berhasil dihapus.');
    }
}
