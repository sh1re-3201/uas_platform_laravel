@extends('layouts.app')

@section('title', 'Tambah Pekerjaan')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Pekerjaan</h2>

        {{-- Error Validation --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('hrd.jobs.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="job_type_id" class="block text-sm font-medium text-gray-700">Tipe Pekerjaan</label>
                <select name="job_type_id" id="job_type_id"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">-- Pilih Tipe --</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('job_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->type_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="salary_min" class="block text-sm font-medium text-gray-700">Gaji Minimum</label>
                    <input type="number" name="salary_min" id="salary_min" value="{{ old('salary_min') }}"
                        class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="salary_max" class="block text-sm font-medium text-gray-700">Gaji Maksimum</label>
                    <input type="number" name="salary_max" id="salary_max" value="{{ old('salary_max') }}"
                        class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                <input type="date" name="deadline" id="deadline" value="{{ old('deadline') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div>
                <label for="qualifications_input" class="block text-sm font-medium text-gray-700">
                    Kualifikasi (pisahkan dengan koma)
                </label>
                <input type="text" name="qualifications_input" id="qualifications_input" value="{{ old('qualifications_input') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="requirements_input" class="block text-sm font-medium text-gray-700">
                    Persyaratan (pisahkan dengan koma)
                </label>
                <input type="text" name="requirements_input" id="requirements_input" value="{{ old('requirements_input') }}"
                    class="mt-1 block w-full px-4 py-2 border rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
