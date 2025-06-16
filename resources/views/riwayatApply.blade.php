@extends('layouts.app')

@section('title', 'Riwayat Lamaran Masuk')

@section('content')
<div class="w-full px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Riwayat Lamaran Masuk</h1>

    <div class="overflow-x-auto bg-white shadow-xl rounded-xl">
        <table class="min-w-full text-sm text-left text-gray-700 divide-y divide-gray-200">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="px-6 py-4 font-semibold uppercase">#</th>
                    <th class="px-6 py-4 font-semibold uppercase">Nama Pelamar</th>
                    <th class="px-6 py-4 font-semibold uppercase">Email</th>
                    <th class="px-6 py-4 font-semibold uppercase">Posisi</th>
                    <th class="px-6 py-4 font-semibold uppercase">Tanggal Apply</th>
                    <th class="px-6 py-4 font-semibold uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @php $i = 1; @endphp
                @foreach ([
                    ['nama' => 'Aldi Pratama', 'email' => 'aldi@mail.com', 'posisi' => 'UI Designer', 'tanggal' => '03 Jun 2025', 'status' => 'Menunggu'],
                    ['nama' => 'Sinta Dewi', 'email' => 'sinta@mail.com', 'posisi' => 'Backend Developer', 'tanggal' => '28 Mei 2025', 'status' => 'Diterima'],
                    ['nama' => 'Fahmi Ramadhan', 'email' => 'fahmi@mail.com', 'posisi' => 'Digital Marketing', 'tanggal' => '21 Mei 2025', 'status' => 'Ditolak'],
                ] as $apply)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $i++ }}</td>
                        <td class="px-6 py-4 font-medium">{{ $apply['nama'] }}</td>
                        <td class="px-6 py-4">{{ $apply['email'] }}</td>
                        <td class="px-6 py-4">{{ $apply['posisi'] }}</td>
                        <td class="px-6 py-4">{{ $apply['tanggal'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $status = $apply['status'];
                                $badge = match($status) {
                                    'Diterima' => 'bg-green-100 text-green-700',
                                    'Ditolak' => 'bg-red-100 text-red-700',
                                    default => 'bg-yellow-100 text-yellow-700',
                                };
                            @endphp
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full {{ $badge }}">
                                {{ $status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p class="text-center text-sm text-gray-500 mt-6">Data ini hanya contoh. Silakan hubungkan dengan database nanti.</p>
</div>
@endsection