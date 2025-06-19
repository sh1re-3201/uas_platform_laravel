<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="mb-3 d-flex justify-content-between">
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                        &larr; Kembali ke Dashboard
                    </a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h3 class="mb-0">{{ $user->name }}</h3>
                            <small class="text-muted">{{ $user->email }}</small>
                        </div>
                        <hr>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-borderless mb-4">
                            <tr>
                                <th scope="row" class="text-secondary">Tanggal Lahir</th>
                                <td>{{ \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-secondary">Pendidikan Terakhir</th>
                                <td>{{ $user->pendidikan_terakhir }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-secondary">Pengalaman Kerja</th>
                                <td>{{ $user->pengalaman_kerja }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-secondary">Skills</th>
                                <td>{{ $user->skills }}</td>
                            </tr>
                        </table>

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary px-4">Edit Profil</a>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary px-4">Kembali ke Dashboard</a>
                        
                        </div>
                        <div class="d-grid mt-4">
                            <a href="{{route('user.riwayatLamaran') }}" class="btn btn-primary px-5">Daftar Riwayat Lamaran</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>