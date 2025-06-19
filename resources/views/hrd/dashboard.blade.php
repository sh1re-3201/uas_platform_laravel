@extends('layouts.app') <!-- Ganti sesuai layout Bootstrap yang kamu pakai -->

@section('title', 'Dashboard HRD')

@section('content')
    <div class="mb-4">
        <h2 class="h4 fw-semibold text-dark">Dashboard HRD</h2>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="row g-4">
        <!-- Kartu Jumlah Pekerjaan -->
        <div class="col-md-6">
            <div class="card text-white bg-primary h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pekerjaan</h5>
                    <p class="display-5 fw-bold my-3">{{ $jobCount }}</p>
                    <a href="{{ route('hrd.jobs') }}" class="text-white text-decoration-underline small">Kelola Pekerjaan</a>
                </div>
            </div>
        </div>

        <!-- Kartu Jumlah Pelamar -->
        <div class="col-md-6">
            <div class="card text-white bg-success h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pelamar</h5>
                    <p class="display-5 fw-bold my-3">{{ $applicantCount }}</p>
                    <a href="{{ route('hrd.applicants') }}" class="text-white text-decoration-underline small">Lihat Pelamar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
