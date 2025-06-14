<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi')</title>
    @vite('resources/css/app.css')

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="app bg-white h-full">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 overflow-hidden bg-[#69553E] text-white transition-all duration-300 ease-in-out min-h-screen">
            <div class="flex justify-end px-4 py-2">
                <button id="toggleSidebar">
                    <i class="bi bi-list text-2xl"></i>
                </button>
            </div>

            <!-- User Info -->
           <div class="text-center mt-4 space-y-1 sidebar-text">
    <i class="bi bi-person-circle text-3xl"></i>
    <div class="font-semibold text-white text-sm">Username</div>
    <div class="text-xs text-gray-300">username@gmail.com</div>
</div>


            <!-- Menu -->
            <nav class="mt-6 space-y-4 px-4">
                <a href="{{ route('edit.profile') }}" class="flex justify-between items-center text-white hover:text-gray-300">
                    <div class="flex items-center space-x-3">
                        <i class="bi bi-person text-xl"></i>
                        <span class="sidebar-text transition-all duration-300">My Profile</span>
                    </div>
                    <i class="bi bi-chevron-right text-sm sidebar-text transition-all duration-300"></i>
                </a>

                <a href="{{ route('riwayat.apply') }}" class="flex justify-between items-center text-white hover:text-gray-300">
                    <div class="flex items-center space-x-3">
                        <i class="bi bi-clock-history text-xl"></i>
                        <span class="sidebar-text transition-all duration-300">Riwayat Apply</span>
                    </div>
                    <i class="bi bi-chevron-right text-sm sidebar-text transition-all duration-300"></i>
                </a>

                <a href="#" class="flex items-center space-x-3 text-white hover:text-gray-300">
                    <i class="bi bi-gear text-xl"></i>
                    <span class="sidebar-text transition-all duration-300">Settings</span>
                </a>

                <a href="#" class="flex items-center space-x-3 text-white hover:text-gray-300">
                    <i class="bi bi-box-arrow-right text-xl"></i>
                    <span class="sidebar-text transition-all duration-300">Log out</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto p-6 bg-gray-50">
            @yield('content')
        </main>
    </div>

    <!-- Script Toggle -->
    <script>
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarTexts = document.querySelectorAll('.sidebar-text');

        toggleBtn.addEventListener('click', () => {
            const isCollapsed = sidebar.classList.contains('w-16');

            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');

            sidebarTexts.forEach(span => {
                if (isCollapsed) {
                    span.classList.remove('hidden');
                } else {
                    span.classList.add('hidden');
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
