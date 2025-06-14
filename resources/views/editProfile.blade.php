{{-- resources/views/editProfile.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="bg-white w-full max-w-2xl p-8 rounded-2xl shadow-lg mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Profil Saya</h2>

    <form id="profileForm" class="space-y-6" action="#" method="POST">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Lengkap</label>
            <p class="text-gray-800" id="namaView">Budi Santoso</p>
            <input type="text" id="namaInput" name="nama" value="Budi Santoso"
                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 hidden" required>
        </div>

        <!-- Alamat -->
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Alamat</label>
            <p class="text-gray-800" id="alamatView">Jl. Melati No. 123, Jakarta</p>
            <input type="text" id="alamatInput" name="alamat" value="Jl. Melati No. 123, Jakarta"
                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 hidden" required>
        </div>

        <!-- Tanggal Lahir -->
        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Tanggal Lahir</label>
            <p class="text-gray-800" id="tanggalView">1990-01-01</p>
            <input type="date" id="tanggalInput" name="tanggal_lahir" value="1990-01-01"
                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:ring-2 focus:ring-blue-500 hidden" required>
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

        const viewElements = ['namaView', 'alamatView', 'tanggalView'];
        const inputElements = ['namaInput', 'alamatInput', 'tanggalInput'];

        editBtn.addEventListener('click', () => {
            viewElements.forEach(id => document.getElementById(id).classList.add('hidden'));
            inputElements.forEach(id => document.getElementById(id).classList.remove('hidden'));
            editBtn.classList.add('hidden');
            saveBtn.classList.remove('hidden');
            cancelBtn.classList.remove('hidden');
        });

        cancelBtn.addEventListener('click', () => {
            viewElements.forEach(id => document.getElementById(id).classList.remove('hidden'));
            inputElements.forEach(id => document.getElementById(id).classList.add('hidden'));
            editBtn.classList.remove('hidden');
            saveBtn.classList.add('hidden');
            cancelBtn.classList.add('hidden');
        });
    });
</script>
@endpush
