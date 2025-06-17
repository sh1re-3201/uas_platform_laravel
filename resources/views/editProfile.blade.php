@extends('layouts.app')

@section('title', 'Edit Profil Admin')

@section('content')
<div class="bg-white w-full max-w-2xl p-8 rounded-2xl shadow-lg mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Profil Admin</h2>

    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form id="profileForm" class="space-y-6" action="{{ route('admin.profile.update') }}" method="POST">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Lengkap</label>
            <p class="text-gray-800" id="namaView">{{ $user->name }}</p>
            <input type="text" id="namaInput" name="nama" value="{{ old('nama', $user->name) }}"
                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 hidden" required>
        </div>

        <!-- Tanggal Lahir -->
    <div>
    <label class="block text-sm font-semibold text-gray-600 mb-1">Tanggal Lahir</label>
    
    {{-- Tampilan teks dalam format dd-mm-yyyy --}}
    <p class="text-gray-800" id="tanggalView">
        {{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') : '-' }}
    </p>

    {{-- Input tetap dalam format yyyy-mm-dd agar valid --}}
    <input type="date" id="tanggalInput" name="tanggal_lahir" 
        value="{{ old('tanggal_lahir', \Carbon\Carbon::parse($user->tanggal_lahir)->format('Y-m-d')) }}"
        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 hidden">
</div>


        <!-- Pendidikan Terakhir -->
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Pendidikan Terakhir</label>
            <p class="text-gray-800" id="pendidikanView">{{ $user->pendidikan_terakhir ?? '-' }}</p>
            <input type="text" id="pendidikanInput" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $user->pendidikan_terakhir) }}"
                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 hidden">
        </div>

        <!-- Pengalaman Kerja -->
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Pengalaman Kerja</label>
            <p class="text-gray-800" id="pengalamanView">{{ $user->pengalaman_kerja ?? '-' }}</p>
            <input type="text" id="pengalamanInput" name="pengalaman_kerja" value="{{ old('pengalaman_kerja', $user->pengalaman_kerja) }}"
                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 hidden">
        </div>

        <!-- Skills -->
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Skills</label>
            <p class="text-gray-800" id="skillsView">{{ $user->skills ?? '-' }}</p>
            <input type="text" id="skillsInput" name="skills" value="{{ old('skills', $user->skills) }}"
                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 hidden">
        </div>
        <!-- Password -->
<div>
    <label class="block text-sm font-semibold text-gray-600 mb-1">Password Baru</label>
    <input type="password" name="password"
        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500">
</div>

<!-- Konfirmasi Password -->
<div>
    <label class="block text-sm font-semibold text-gray-600 mb-1">Konfirmasi Password</label>
    <input type="password" name="password_confirmation"
        class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500">
</div>


        <!-- Tombol Aksi -->
        <div class="flex justify-end space-x-4 pt-4">
            <button type="button" id="editBtn"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition duration-200">
                Edit
            </button>
            <button type="submit" id="saveBtn"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg shadow hidden transition duration-200">
                Simpan
            </button>
            <button type="button" id="cancelBtn"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-5 py-2 rounded-lg shadow hidden transition duration-200">
                Batal
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editBtn = document.getElementById('editBtn');
        const saveBtn = document.getElementById('saveBtn');
        const cancelBtn = document.getElementById('cancelBtn');

        const fieldIds = ['nama', 'tanggal', 'pendidikan', 'pengalaman', 'skills'];

        function toggleEditMode(isEdit) {
            fieldIds.forEach(id => {
                const viewEl = document.getElementById(id + 'View');
                const inputEl = document.getElementById(id + 'Input');
                if (viewEl && inputEl) {
                    viewEl.classList.toggle('hidden', isEdit);
                    inputEl.classList.toggle('hidden', !isEdit);
                }
            });

            editBtn.classList.toggle('hidden', isEdit);
            saveBtn.classList.toggle('hidden', !isEdit);
            cancelBtn.classList.toggle('hidden', !isEdit);
        }

        editBtn?.addEventListener('click', () => toggleEditMode(true));
        cancelBtn?.addEventListener('click', () => toggleEditMode(false));
    });
</script>
@endpush
