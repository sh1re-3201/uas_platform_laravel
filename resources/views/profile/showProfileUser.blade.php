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
        <h2 class="text-center">Profile</h2>
    <hr>

    <div class="card">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center"><b>Profil</b></h2>
                <hr>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="form-control bg-light">{{ $user->nama }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="form-control bg-light">{{ $user->email }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tempat, Tanggal Lahir</label>
                    <div class="form-control bg-light">
                        {{ $user->tempat_lahir }}, {{ \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pendidikan Terakhir</label>
                    <div class="form-control bg-light">{{ $user->pendidikan }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Pengalaman Kerja</label>
                    <div class="form-control bg-light">{{ $user->pengalaman }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Skill</label>
                    <div class="form-control bg-light">{{ $user->skill }}</div>
                </div>

                <a href="{{ route('profile.edit') }}" class="btn btn-primary w-100">Edit Profil</a>
            </div>
        </div>
    </div>
</body>
</html>
