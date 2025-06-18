<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard HRD')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-white h-full">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-blue-900 text-white min-h-screen transition-all duration-300 ease-in-out">
            <div class="flex justify-end px-4 py-2">
                <button id="toggleSidebar">
                    <i class="bi bi-list text-2xl"></i>
                </button>
            </div>

            <!-- User Info (Dinamis sesuai auth user) -->

            <div class="text-center mt-4 space-y-1 sidebar-text">
                <i class="bi bi-person-circle text-3xl"></i>
                <div class="font-semibold text-white text-sm">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <!-- Menu -->
            <nav class="mt-6 space-y-4 px-4">
                <a href="{{ route('hrd.dashboard') }}" class="flex items-center space-x-3 text-white hover:text-gray-300">
                    <i class="bi bi-speedometer2 text-xl"></i>
                    <span class="sidebar-text transition-all duration-300">Dashboard</span>
                </a>
                <a href="{{ route('hrd.jobs') }}" class="flex items-center space-x-3 text-white hover:text-gray-300">
                    <i class="bi bi-briefcase text-xl"></i>
                    <span class="sidebar-text transition-all duration-300">Kelola Pekerjaan</span>
\                </a>
                <a href="{{ route('hrd.applicants') }}" class="flex items-center space-x-3 text-white hover:text-gray-300">
                    <i class="bi bi-people text-xl"></i>
                    <span class="sidebar-text transition-all duration-300">Daftar Pelamar</span>
                </a>
                <a href="{{ route('hrd.profile') }}" class="flex items-center space-x-3 text-white hover:text-gray-300">
                    <i class="bi bi-person text-xl"></i>
                    <span class="sidebar-text transition-all duration-300">Profil Saya</span>
                </a>



                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 text-white hover:text-gray-300">
                        <i class="bi bi-box-arrow-right text-xl"></i>
                        <span class="sidebar-text transition-all duration-300">Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-6 bg-gray-50">
            @yield('content')
        </main>
    </div>

    <!-- Toggle Sidebar Script -->
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarTexts = document.querySelectorAll('.sidebar-text');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');

            sidebarTexts.forEach(span => {
                span.classList.toggle('hidden');
            });
        });
    </script>

    @stack('scripts')
</body>

</html>