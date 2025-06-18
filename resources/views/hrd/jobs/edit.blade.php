@extends('layouts.app')

@section('title', 'Edit Pekerjaan')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Pekerjaan</h2>

    {{-- Tampilkan pesan error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hrd.jobs.update', $job->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $job->description) }}</textarea>
        </div>

        <div>
            <label for="job_type_id" class="block text-sm font-medium text-gray-700">Tipe Pekerjaan</label>
            <select name="job_type_id" id="job_type_id"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('job_type_id', $job->job_type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
            <input type="text" name="location" id="location" value="{{ old('location', $job->location) }}"
                   class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="salary_min" class="block text-sm font-medium text-gray-700">Gaji Minimum</label>
                <input type="number" name="salary_min" id="salary_min" value="{{ old('salary_min', $job->salary_min) }}"
                       class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="salary_max" class="block text-sm font-medium text-gray-700">Gaji Maksimum</label>
                <input type="number" name="salary_max" id="salary_max" value="{{ old('salary_max', $job->salary_max) }}"
                       class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <div>
            <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
            <input type="date" name="deadline" id="deadline"
                   value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}"
                   class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="active" {{ old('status', $job->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $job->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div>
            <label for="qualifications_input" class="block text-sm font-medium text-gray-700">
                Kualifikasi (pisahkan dengan koma)
            </label>
            <input type="text" name="qualifications_input" id="qualifications_input"
                   value="{{ old('qualifications_input', is_array($job->qualifications) ? implode(',', $job->qualifications) : '') }}"
                   class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="requirements_input" class="block text-sm font-medium text-gray-700">
                Persyaratan (pisahkan dengan koma)
            </label>
            <input type="text" name="requirements_input" id="requirements_input"
                   value="{{ old('requirements_input', is_array($job->requirements) ? implode(',', $job->requirements) : '') }}"
                   class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="pt-4 flex items-center gap-3">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-2 rounded shadow">
                Update
            </button>
            <a href="{{ route('hrd.jobs') }}"
               class="text-gray-700 hover:text-gray-900 border border-gray-300 px-6 py-2 rounded shadow">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
