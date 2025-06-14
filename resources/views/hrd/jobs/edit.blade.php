@extends('layouts.app')

@section('title', 'Edit Pekerjaan')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Pekerjaan</h2>

    {{-- Tampilkan pesan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
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
            <input type="text" name="title" id="title" class="form-control"
                   value="{{ old('title', $job->title) }}" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $job->description) }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="job_type_id" class="form-label">Tipe Pekerjaan</label>
            <select name="job_type_id" id="job_type_id" class="form-control" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('job_type_id', $job->job_type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
            @error('job_type_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control"
                   value="{{ old('location', $job->location) }}" required>
            @error('location') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="salary_min" class="form-label">Gaji Minimum</label>
            <input type="number" name="salary_min" id="salary_min" class="form-control"
                   value="{{ old('salary_min', $job->salary_min) }}">
            @error('salary_min') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="salary_max" class="form-label">Gaji Maksimum</label>
            <input type="number" name="salary_max" id="salary_max" class="form-control"
                   value="{{ old('salary_max', $job->salary_max) }}">
            @error('salary_max') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-control"
                   value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}">
            @error('deadline') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ old('status', $job->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $job->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="qualifications_input" class="form-label">Kualifikasi (pisahkan dengan koma)</label>
            <input type="text" name="qualifications_input" id="qualifications_input" class="form-control"
                   value="{{ old('qualifications_input', is_array($job->qualifications) ? implode(',', $job->qualifications) : '') }}">
            @error('qualifications_input') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="requirements_input" class="form-label">Persyaratan (pisahkan dengan koma)</label>
            <input type="text" name="requirements_input" id="requirements_input" class="form-control"
                   value="{{ old('requirements_input', is_array($job->requirements) ? implode(',', $job->requirements) : '') }}">
            @error('requirements_input') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('hrd.jobs') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
