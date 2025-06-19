@extends('layouts.app')

@section('title', 'Edit Pekerjaan')

@section('content')
<div class="container" style="max-width: 720px;">
    <h2 class="h4 fw-bold mb-4 text-dark">Edit Pekerjaan</h2>

    {{-- Tampilkan pesan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hrd.jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $job->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="job_type_id" class="form-label">Tipe Pekerjaan</label>
            <select name="job_type_id" id="job_type_id" class="form-select" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('job_type_id', $job->job_type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" id="location" value="{{ old('location', $job->location) }}" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="salary_min" class="form-label">Gaji Minimum</label>
                <input type="number" name="salary_min" id="salary_min" value="{{ old('salary_min', $job->salary_min) }}" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="salary_max" class="form-label">Gaji Maksimum</label>
                <input type="number" name="salary_max" id="salary_max" value="{{ old('salary_max', $job->salary_max) }}" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" name="deadline" id="deadline" value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="active" {{ old('status', $job->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $job->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="qualifications_input" class="form-label">Kualifikasi (pisahkan dengan koma)</label>
            <input type="text" name="qualifications_input" id="qualifications_input"
                   value="{{ old('qualifications_input', is_array($job->qualifications) ? implode(',', $job->qualifications) : '') }}"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label for="requirements_input" class="form-label">Persyaratan (pisahkan dengan koma)</label>
            <input type="text" name="requirements_input" id="requirements_input"
                   value="{{ old('requirements_input', is_array($job->requirements) ? implode(',', $job->requirements) : '') }}"
                   class="form-control">
        </div>

        <div class="d-flex gap-2 pt-3">
            <button type="submit" class="btn btn-success px-4">Update</button>
            <a href="{{ route('hrd.jobs') }}" class="btn btn-outline-secondary px-4">Batal</a>
        </div>
    </form>
</div>
@endsection
