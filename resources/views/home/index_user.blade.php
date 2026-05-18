@extends('layout.user')

@section('content')

<main class="container mx-auto px-4 py-8 fade-in">
    
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl text-white p-8 mb-12">
        <div class="max-w-2xl">
            <h1 class="text-4xl font-bold mb-4">Bienvenido a la Biblioteca Central</h1>
            <p class="text-lg mb-6 opacity-90">Descubre un mundo de conocimiento, cultura y entretenimiento. Más de 10,000 libros disponibles para ti.</p>
            <div class="flex gap-4">
                <a href="" class="bg-white text-purple-600 hover:bg-gray-100 px-6 py-2 rounded-lg font-semibold transition">
                    <i class="fas fa-search mr-2"></i>Explorar Catálogo
                </a>
                @guest
                <a href="{{ route('loginGet') }}" class="border-2 border-white hover:bg-white hover:text-purple-600 px-6 py-2 rounded-lg font-semibold transition">
                    <i class="fas fa-user-plus mr-2"></i>Iniciar Sesión
                </a>
                @endguest
            </div>
        </div>
    </div>

    <!-- Libros Destacados -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Libros Destacados</h2>
            <a href="" class="text-blue-600 hover:text-blue-800">Ver todos →</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($librosDestacados ?? [] as $libro)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                <div class="h-40 bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center">
                    <i class="fas fa-book text-white text-5xl"></i>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-lg mb-1">{{ $libro->nombre }}</h3>
                    <p class="text-gray-600 text-sm mb-2">{{ $libro->autor }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xs px-2 py-1 rounded-full {{ $libro->disponibles > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $libro->disponibles > 0 ? 'Disponible' : 'Prestado' }}
                        </span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Ver más →</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center text-gray-500 py-8">
                <i class="fas fa-book-open text-4xl mb-2 block"></i>
                <p>Próximamente más libros</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Servicios -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Nuestros Servicios</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-book-reader text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Préstamo de Libros</h3>
                <p class="text-gray-600">Solicita préstamos de libros físicos y digitales de manera fácil.</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-laptop text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Sala de Cómputo</h3>
                <p class="text-gray-600">Acceso gratuito a computadoras con internet.</p>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chalkboard-teacher text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Talleres y Cursos</h3>
                <p class="text-gray-600">Participa en talleres de lectura y escritura.</p>
            </div>
        </div>
    </div>

    <!-- Sobre Nosotros -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-12">
        <div class="flex flex-col md:flex-row items-center gap-6">
            <div class="md:w-1/2">
                <img src="https://via.placeholder.com/500x300/4F46E5/FFFFFF?text=Nuestra+Biblioteca" alt="Biblioteca" class="rounded-lg w-full">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Sobre Nosotros</h2>
                <p class="text-gray-600 mb-4">
                    Fundada en 1985, la Biblioteca Central se ha convertido en un referente cultural y educativo.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600">10k+</div>
                        <p class="text-gray-600 text-sm">Libros</p>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600">5k+</div>
                        <p class="text-gray-600 text-sm">Usuarios</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contacto rápido -->
    <div class="bg-gray-50 rounded-lg p-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">¿Tienes preguntas?</h2>
        <p class="text-gray-600 mb-4">Contáctanos y te ayudaremos</p>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg inline-block transition">
            <i class="fas fa-envelope mr-2"></i>Contáctanos
        </a>
    </div>

</main>
@endsection