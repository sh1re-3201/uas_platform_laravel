@extends('layouts.app')

@section('title', 'Daftar Pekerjaan')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Pekerjaan</h2>
        <a href="{{ route('hrd.jobs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Pekerjaan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter Sorting -->
    <form method="GET" action="{{ route('hrd.jobs') }}" class="mb-4">
        <label for="sort" class="block mb-1 font-medium text-gray-700">Urutkan berdasarkan deadline:</label>
        <select name="sort" id="sort" onchange="this.form.submit()" class="w-full md:w-64 px-3 py-2 border rounded focus:outline-none focus:ring">
            <option value="">-- Pilih --</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terdekat</option>
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Terlama</option>
        </select>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Deskripsi</th>
                    <th class="px-4 py-2">Tipe</th>
                    <th class="px-4 py-2">Deadline</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $job->title }}</td>
                        <td class="px-4 py-2">{{ Str::limit($job->description, 50) }}</td>
                        <td class="px-4 py-2">{{ $job->jobType->type_name }}</td>
                        <td class="px-4 py-2">{{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('d-m-Y') : '-' }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('hrd.jobs.edit', $job->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</a>
                            <form action="{{ route('hrd.jobs.delete', $job->id) }}" method="POST" onsubmit="return confirm('Hapus pekerjaan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($jobs->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada pekerjaan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
