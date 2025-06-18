<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard HRD')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        #sidebar {
            min-height: 100vh;
            transition: all 0.3s ease-in-out;
        }

        .sidebar-collapsed .sidebar-text {
            display: none;
        }

        .sidebar-collapsed #sidebar {
            width: 60px;
        }

        .sidebar-collapsed .nav-link {
            justify-content: center;
        }
    </style>
</head>

<body class="bg-white h-100">
    <div class="d-flex h-100">
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-primary text-white p-3" style="width: 250px;">
            <div class="d-flex justify-content-end">
                <button id="toggleSidebar" class="btn btn-sm btn-light text-dark">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- User Info -->
            <div class="text-center mt-3">
                <i class="bi bi-person-circle fs-2"></i>
                <div class="fw-semibold sidebar-text">{{ Auth::user()->name }}</div>
                <div class="small text-light sidebar-text">{{ Auth::user()->email }}</div>
            </div>

            <!-- Navigation Menu -->
            <nav class="nav flex-column mt-4">
                <a href="{{ route('hrd.dashboard') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-speedometer2"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>
                <a href="{{ route('hrd.jobs') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-briefcase"></i>
                    <span class="sidebar-text">Kelola Pekerjaan</span>
                </a>
                <a href="{{ route('hrd.applicants') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-people"></i>
                    <span class="sidebar-text">Daftar Pelamar</span>
                </a>
                <a href="{{ route('hrd.profile') }}" class="nav-link text-white d-flex align-items-center gap-2">
                    <i class="bi bi-person"></i>
                    <span class="sidebar-text">Profil Saya</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-light w-100 d-flex align-items-center gap-2">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="sidebar-text">Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow-1 bg-light p-4 overflow-auto">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const body = document.body;

        toggleBtn.addEventListener('click', () => {
            body.classList.toggle('sidebar-collapsed');
        });
    </script>

    @stack('scripts')
</body>

</html>
