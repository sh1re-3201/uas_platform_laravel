<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1HI3F5e6l6eAdW9rZCkQ2IsbYB6vEWlZ7Yqbiw3v8QK" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center"><b>Profile</b></h2>
                <hr>
                @if(session('error'))
                    <div class="alert alert-danger">
                        <b>Oops!</b> {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $user->tempat_lahir) }}" required>
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pendidikan Terakhir</label>
                        <select name="pendidikan" class="form-select" required>
                            <option disabled>-- Pilih Pendidikan --</option>
                            <option value="SMA/SMK" {{ old('pendidikan', $user->pendidikan) == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                            <option value="D3" {{ old('pendidikan', $user->pendidikan) == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ old('pendidikan', $user->pendidikan) == 'S1' ? 'selected' : '' }}>S1</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pengalaman Kerja</label>
                        <input type="text" name="pengalaman" class="form-control" value="{{ old('pengalaman', $user->pengalaman) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Skills</label>
                        <input type="text" name="skills" class="form-control" value="{{ old('skills', $user->skills) }}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
