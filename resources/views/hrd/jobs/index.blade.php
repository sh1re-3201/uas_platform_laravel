@extends('layouts.app')

@section('title', 'Daftar Pekerjaan')

@section('content')
    <h2>Daftar Pekerjaan</h2>

    <a href="{{ route('hrd.jobs.create') }}" class="btn btn-primary mb-3">+ Tambah Pekerjaan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter sorting -->
    <form method="GET" action="{{ route('hrd.jobs') }}" class="mb-3">
        <label for="sort" class="form-label">Urutkan berdasarkan deadline:</label>
        <select name="sort" id="sort" class="form-select d-inline w-auto" onchange="this.form.submit()">
            <option value="">-- Pilih --</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terdekat</option>
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Terlama</option>
        </select>
    </form>

    <table class="table table-bordered">
        <thead>
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
                        <a href="{{ route('hrd.jobs.edit', $job->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('hrd.jobs.delete', $job->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus pekerjaan ini?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
