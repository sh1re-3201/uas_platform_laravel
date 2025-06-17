@extends('layouts.app')

@section('title', 'Daftar Pelamar')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Pelamar</h2>

    <div class="overflow-auto rounded-lg shadow border border-gray-200">
        <table class="min-w-full bg-white text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                <tr>
                    <th class="px-4 py-3">Nama Pelamar</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Telepon</th>
                    <th class="px-4 py-3">Pekerjaan</th>
                    <th class="px-4 py-3">Lokasi</th>
                    <th class="px-4 py-3">Deadline</th>
                    <th class="px-4 py-3">Cover Letter</th>
                    <th class="px-4 py-3">Tanggal Melamar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $app)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $app->user->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $app->user->email ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $app->user->phone ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $app->job->title ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $app->job->location ?? '-' }}</td>
                        <td class="px-4 py-2">{{ optional($app->job->deadline)->format('d-m-Y') ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $app->cover_letter ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $app->created_at ? $app->created_at->format('d-m-Y H:i') : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center px-4 py-6 text-gray-500">
                            Belum ada pelamar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
