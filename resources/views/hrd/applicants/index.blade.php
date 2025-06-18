@extends('layouts.app')

@section('title', 'Daftar Pelamar')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Pelamar</h2>

    <div class="table-responsive shadow-sm border rounded">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>Nama Pelamar</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Pekerjaan</th>
                    <th>Lokasi</th>
                    <th>Deadline</th>
                    <th>Cover Letter</th>
                    <th>Tanggal Melamar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                    <tr>
                        <td>{{ $app->user->name ?? '-' }}</td>
                        <td>{{ $app->user->email ?? '-' }}</td>
                        <td>{{ $app->user->phone ?? '-' }}</td>
                        <td>{{ $app->job->title ?? '-' }}</td>
                        <td>{{ $app->job->location ?? '-' }}</td>
                        <td>{{ optional($app->job->deadline)->format('d-m-Y') ?? '-' }}</td>
                        <td>{{ $app->cover_letter ?? '-' }}</td>
                        <td>{{ $app->created_at ? $app->created_at->format('d-m-Y H:i') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            Belum ada pelamar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
