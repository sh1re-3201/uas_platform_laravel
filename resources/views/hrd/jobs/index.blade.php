@extends('layouts.app')

@section('title', 'Daftar Pekerjaan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 fw-semibold text-dark">Daftar Pekerjaan</h2>
        <a href="{{ route('hrd.jobs.create') }}" class="btn btn-primary">
            + Tambah Pekerjaan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter Sorting -->
    <form method="GET" action="{{ route('hrd.jobs') }}" class="mb-4">
        <div class="mb-2">
            <label for="sort" class="form-label fw-medium">Urutkan berdasarkan deadline:</label>
            <select name="sort" id="sort" onchange="this.form.submit()" class="form-select w-auto">
                <option value="">-- Pilih --</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terdekat</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Terlama</option>
            </select>
        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tipe</th>
                    <th>Deadline</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->title }}</td>
                        <td>{{ Str::limit($job->description, 50) }}</td>
                        <td>{{ $job->jobType->type_name }}</td>
                        <td>{{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('d-m-Y') : '-' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('hrd.jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('hrd.jobs.delete', $job->id) }}" method="POST" onsubmit="return confirm('Hapus pekerjaan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($jobs->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">Belum ada pekerjaan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
