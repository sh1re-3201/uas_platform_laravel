@extends('layouts.app')

@section('title', 'Edit Profil Admin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Alert --}}
            @if(session('success'))
            <div class="alert alert-success" id="successAlert">
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Profile View --}}
            <div id="profileView" class="card shadow mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">{{ $user->name }}</h3>
                    <small>{{ $user->email }}</small>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Tanggal Lahir</dt>
                        <dd class="col-sm-8">{{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') : 'Tidak ada' }}</dd>
                        <dt class="col-sm-4">Pendidikan Terakhir</dt>
                        <dd class="col-sm-8">{{ $user->pendidikan_terakhir ?? 'Tidak ada' }}</dd>
                        <dt class="col-sm-4">Pengalaman Kerja</dt>
                        <dd class="col-sm-8">{{ $user->pengalaman_kerja ?? 'Tidak ada' }}</dd>
                        <dt class="col-sm-4">Skills</dt>
                        <dd class="col-sm-8">{{ $user->skills ?? 'Tidak ada' }}</dd>
                    </dl>
                </div>
                <div class="card-footer text-end">
                    <button type="button" id="editBtn" class="btn btn-primary px-4">Edit Profil</button>
                </div>
            </div>

            {{-- Profile Edit Form --}}
            <form id="profileForm" action="{{ route('hrd.profile.update') }}" method="POST" class="card shadow mb-4 d-none">
                @csrf
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Edit Profil</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $user->name) }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('Y-m-d') : '') }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan_terakhir" class="form-select">
                            <option value="">-- Pilih Pendidikan --</option>
                            <option value="SMA" {{ old('pendidikan_terakhir', $user->pendidikan_terakhir) == 'SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="D3" {{ old('pendidikan_terakhir', $user->pendidikan_terakhir) == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ old('pendidikan_terakhir', $user->pendidikan_terakhir) == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('pendidikan_terakhir', $user->pendidikan_terakhir) == 'S2' ? 'selected' : '' }}>S2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pengalaman Kerja</label>
                        <input type="text" name="pengalaman_kerja" value="{{ old('pengalaman_kerja', $user->pengalaman_kerja) }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Skills</label>
                        <input type="text" name="skills" value="{{ old('skills', $user->skills) }}" class="form-control">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                    <button type="button" id="cancelBtn" class="btn btn-secondary px-4 ms-2">Batal</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editBtn = document.getElementById('editBtn');
        const profileView = document.getElementById('profileView');
        const profileForm = document.getElementById('profileForm');
        const cancelBtn = document.getElementById('cancelBtn');
        const successAlert = document.getElementById('successAlert');

        editBtn?.addEventListener('click', function () {
            profileView.classList.add('d-none');
            profileForm.classList.remove('d-none');
            if (successAlert) successAlert.style.display = 'none';
        });

        cancelBtn?.addEventListener('click', function () {
            profileForm.classList.add('d-none');
            profileView.classList.remove('d-none');
        });
    });
</script>
@endpush