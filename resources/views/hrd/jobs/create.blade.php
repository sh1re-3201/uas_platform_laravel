@extends('layouts.app')

@section('title', 'Tambah Pekerjaan')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Pekerjaan</h2>

    {{-- Error Validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hrd.jobs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="job_type_id" class="form-label">Tipe Pekerjaan</label>
            <select class="form-select" id="job_type_id" name="job_type_id" required>
                <option value="">-- Pilih Tipe --</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('job_type_id') == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="salary_min" class="form-label">Gaji Minimum</label>
                <input type="number" class="form-control" id="salary_min" name="salary_min" value="{{ old('salary_min') }}"  min="0">
            </div>

            <div class="col-md-6 mb-3">
                <label for="salary_max" class="form-label">Gaji Maksimum</label>
                <input type="number" class="form-control" id="salary_max" name="salary_max" value="{{ old('salary_max') }}" min="0">
            </div>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline') }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="qualifications_input" class="form-label">Kualifikasi (pisahkan dengan koma)</label>
            <input type="text" class="form-control" id="qualifications_input" name="qualifications_input" value="{{ old('qualifications_input') }}">
        </div>

        <div class="mb-3">
            <label for="requirements_input" class="form-label">Persyaratan (pisahkan dengan koma)</label>
            <input type="text" class="form-control" id="requirements_input" name="requirements_input" value="{{ old('requirements_input') }}">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('hrd.jobs') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
