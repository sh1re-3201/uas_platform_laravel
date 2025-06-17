@extends('layouts.app') <!-- Ganti sesuai layout Tailwind yang kamu pakai -->

@section('title', 'Dashboard HRD')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Dashboard HRD</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 mt-4 rounded">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Kartu Jumlah Pekerjaan -->
        <div class="bg-blue-600 text-white rounded-lg p-6 shadow">
            <h3 class="text-lg font-medium">Jumlah Pekerjaan</h3>
            <p class="text-4xl font-bold my-4">{{ $jobCount }}</p>
            <a href="{{ route('hrd.jobs') }}" class="text-sm underline hover:text-gray-200">Kelola Pekerjaan</a>
        </div>

        <!-- Kartu Jumlah Pelamar -->
        <div class="bg-green-600 text-white rounded-lg p-6 shadow">
            <h3 class="text-lg font-medium">Jumlah Pelamar</h3>
            <p class="text-4xl font-bold my-4">{{ $applicantCount }}</p>
            <a href="{{ route('hrd.applicants') }}" class="text-sm underline hover:text-gray-200">Lihat Pelamar</a>
        </div>
    </div>
@endsection
