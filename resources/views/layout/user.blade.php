<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin | Biblioteca Central</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        /* Sidebar móvil */
        .sidebar-mobile {
            position: fixed;
            top: 0;
            left: -300px;
            width: 280px;
            height: 100%;
            background-color: #1f2937;
            color: white;
            transition: left 0.3s ease;
            z-index: 1000;
            padding: 1.5rem;
            overflow-y: auto;
        }

        .sidebar-mobile.open {
            left: 0;
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }

        .sidebar-overlay.show {
            display: block;
        }

        .close-sidebar {
            cursor: pointer;
            float: right;
            font-size: 1.5rem;
            color: white;
        }

        .hamburger-btn {
            display: block;
            cursor: pointer;
        }

        @media (min-width: 769px) {
            .desktop-menu {
                display: flex !important;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Overlay -->
        <div id="sidebarOverlay" class="sidebar-overlay"></div>

        <!-- Sidebar móvil -->
        <div id="sidebarMobile" class="sidebar-mobile">
            <div class="flex justify-end">
                <span id="closeSidebar" class="close-sidebar">&times;</span>
            </div>
            <div class="mt-8">
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="block py-2 hover:text-blue-400 transition">📊 Inicio</a></li>
                    <li><a href="#" class="block py-2 hover:text-blue-400 transition">🔄 Préstamos</a></li>
                    <li class="pt-4 border-t border-gray-700">
                        <a href="{{ route('logout') }}" class="block py-2 text-red-400 hover:text-red-300 transition">🚪 Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>

<!-- HEADER (mismo que la página principal) -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <button id="hamburgerBtn" class="hamburger-btn text-gray-600 focus:outline-none mr-2">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-book-open text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Biblioteca Central</h1>
                        <p class="text-xs text-gray-500">Panel de Administración</p>
                    </div>
                </div>
            </div>
                
                <div id="mobileMenu" class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-6 mt-4 md:mt-0">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-blue-600">Inicio</a>
                    <a href="#" class="text-gray-600 hover:text-blue-600">Préstamos</a>
                    <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-3 mt-4 md:mt-0">
                        <a href="{{ route('logout') }}" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>Cerrar Sesión
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')

    <!-- SCRIPT DEL SIDEBAR -->
    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebarMobile = document.getElementById('sidebarMobile');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const closeSidebar = document.getElementById('closeSidebar');

        if (hamburgerBtn) {
            hamburgerBtn.addEventListener('click', function() {
                sidebarMobile.classList.add('open');
                sidebarOverlay.classList.add('show');
            });
        }

        if (closeSidebar) {
            closeSidebar.addEventListener('click', function() {
                sidebarMobile.classList.remove('open');
                sidebarOverlay.classList.remove('show');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                sidebarMobile.classList.remove('open');
                sidebarOverlay.classList.remove('show');
            });
        }
    </script>

    @include('partials.admin.footer')
</body>
</html>

