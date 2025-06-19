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
                    <th>Pekerjaan</th>
                    <th>Lokasi</th>
                    <th>Deadline</th>
                    <th>Tanggal Melamar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                    <tr>
                        <td>{{ $app->user->name ?? '-' }}</td>
                        <td>{{ $app->user->email ?? '-' }}</td>
                        <td>{{ $app->job->title ?? '-' }}</td>
                        <td>{{ $app->job->location ?? '-' }}</td>
                        <td>{{ optional($app->job->deadline)->format('d-m-Y') ?? '-' }}</td>
                        <td>{{ $app->created_at ? $app->created_at->format('d-m-Y H:i') : '-' }}</td>
                        <td class="text-center">
                            @if(is_null($app->application_status))
                                <span class="badge bg-warning text-dark">Menunggu</span>
                            @elseif($app->application_status)
                                <span class="badge bg-success">Diterima</span>
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(is_null($app->application_status))
                                <form action="{{ route('hrd.lamaran.update', $app->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="1">
                                    <button class="btn btn-sm btn-success" onclick="return confirm('Terima pelamar ini?')">Terima</button>
                                </form>
                                <form action="{{ route('hrd.lamaran.update', $app->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="0">
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Tolak pelamar ini?')">Tolak</button>
                                </form>
                            @else
                                <em>-</em>
                            @endif
                        </td>
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
