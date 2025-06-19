<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard HRD')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .sidebar-collapsed .sidebar-text {
            display: none;
        }

        .sidebar {
            transition: width 0.3s ease-in-out;
        }

        .sidebar-collapsed {
            width: 70px !important;
        }
    </style>
</head>

<body class="bg-white h-100">
    <div class="d-flex vh-100 overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar bg-primary text-white p-3" style="width: 250px;">
            <div class="d-flex justify-content-end">
                <button id="toggleSidebar" class="btn btn-link text-white">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>

            <!-- User Info -->
            <div class="text-center mt-3 sidebar-text">
                <i class="bi bi-person-circle fs-2"></i>
                <div class="fw-semibold text-white small">{{ Auth::user()->name }}</div>
                <div class="text-white-50 small">{{ Auth::user()->email }}</div>
            </div>

            <!-- Menu -->
            <nav class="mt-4 sidebar-text">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('hrd.dashboard') }}" class="nav-link text-white">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hrd.jobs') }}" class="nav-link text-white">
                            <i class="bi bi-briefcase me-2"></i> Kelola Pekerjaan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hrd.applicants') }}" class="nav-link text-white">
                            <i class="bi bi-people me-2"></i> Daftar Pelamar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hrd.profile') }}" class="nav-link text-white">
                            <i class="bi bi-person me-2"></i> Profil Saya
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link text-white p-0">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow-1 p-4 bg-light overflow-auto">
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS Bundle (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Toggle Sidebar Script -->
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-collapsed');
        });
    </script>

    @stack('scripts')
</body>

</html>
