{{-- filepath: resources/views/profile/riwayatLamaranUser.blade.php --}}
@extends('layouts.app')

@section('title', 'Riwayat Lamaran Saya')

@section('content')
    <div class="mb-4">
        <h2 class="h4 fw-semibold text-dark">Riwayat Lamaran Saya</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul Pekerjaan</th>
                    <th>Deskripsi</th>
                    <th>Tipe</th>
                    <th>Deadline</th>
                    <th>Status Lamaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayatLamaran as $application)
                    <tr>
                        <td>{{ $application->jobListing->title ?? '-' }}</td>
                        <td>{{ Str::limit($application->jobListing->description ?? '-', 50) }}</td>
                        <td>{{ $application->jobListing->jobType->type_name ?? '-' }}</td>
                        <td>{{ $application->jobListing->deadline ? \Carbon\Carbon::parse($application->jobListing->deadline)->format('d-m-Y') : '-' }}</td>
                        <td>{{ $application->status ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">Belum ada lamaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection