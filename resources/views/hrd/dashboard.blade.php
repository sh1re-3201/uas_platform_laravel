@extends('layouts.app') <!-- Ganti jika kamu pakai layout lain -->

@section('title', 'Dashboard HRD')

@section('content')
<div class="container mt-4">
    <h2>Dashboard HRD</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pekerjaan</h5>
                    <p class="card-text display-5">{{ $jobCount }}</p>
                    <a href="{{ route('hrd.jobs') }}" class="btn btn-light btn-sm">Kelola Pekerjaan</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pelamar</h5>
                    <p class="card-text display-5">{{ $applicantCount }}</p>
                    <a href="{{ route('hrd.applicants') }}" class="btn btn-light btn-sm">Lihat Pelamar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
