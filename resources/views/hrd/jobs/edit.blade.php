@extends('layouts.app')

@section('title', 'Edit Pekerjaan')

@section('content')
    <h2>Edit Pekerjaan</h2>

    <form action="{{ route('hrd.jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $job->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Tipe Pekerjaan</label>
            <select name="job_type_id" class="form-control" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('job_type_id', $job->job_type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
            @error('job_type_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $job->location) }}" required>
            @error('location')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Gaji Minimum</label>
            <input type="number" name="salary_min" class="form-control" value="{{ old('salary_min', $job->salary_min) }}">
            @error('salary_min')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Gaji Maksimum</label>
            <input type="number" name="salary_max" class="form-control" value="{{ old('salary_max', $job->salary_max) }}">
            @error('salary_max')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}">
            @error('deadline')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ old('status', $job->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $job->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

       

        <div class="mb-3">
            <label>Kualifikasi (pisahkan dengan koma)</label>
            <input type="text" name="qualifications_input" class="form-control"
                   value="{{ old('qualifications_input', is_array($job->qualifications) ? implode(',', $job->qualifications) : '') }}">
            @error('qualifications_input')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Persyaratan (pisahkan dengan koma)</label>
            <input type="text" name="requirements_input" class="form-control"
                   value="{{ old('requirements_input', is_array($job->requirements) ? implode(',', $job->requirements) : '') }}">
            @error('requirements_input')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('hrd.jobs') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
