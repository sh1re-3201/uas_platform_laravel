@extends('layouts.app')

@section('title', 'Tambah Pekerjaan')

@section('content')
    <h2>Tambah Pekerjaan</h2>

    <form action="{{ route('hrd.jobs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Tipe Pekerjaan</label>
            <select name="job_type_id" class="form-control" required>
                <option value="">-- Pilih Tipe --</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Gaji Minimum</label>
            <input type="number" name="salary_min" class="form-control">
        </div>

        <div class="mb-3">
            <label>Gaji Maksimum</label>
            <input type="number" name="salary_max" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        

        <div class="mb-3">
            <label>Kualifikasi (pisahkan dengan koma)</label>
            <input type="text" name="qualifications_input" class="form-control">
        </div>

        <div class="mb-3">
            <label>Persyaratan (pisahkan dengan koma)</label>
            <input type="text" name="requirements_input" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
