<!-- resources/views/profile/showProfileUser.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4"><b>Profil</b></h2>
                <hr>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-borderless">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Pendidikan Terakhir</th>
                        <td>{{ $user->pendidikan_terakhir }}</td>
                    </tr>
                    <tr>
                        <th>Pengalaman Kerja</th>
                        <td>{{ $user->pengalaman_kerja }}</td>
                    </tr>
                    <tr>
                        <th>Skills</th>
                        <td>{{ $user->skills }}</td>
                    </tr>
                </table>

                <div class="text-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
