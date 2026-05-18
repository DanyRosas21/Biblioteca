@extends('layout.admin')

@section('content')
<main class="container mx-auto px-4 py-8 fade-in">
    
    <!-- Título -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800">Categorías</h2>
        <p class="text-gray-600">Gestiona las categorías de los libros</p>
    </div>

    <!-- Tabla de categorías -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Lista de Categorías</h3>

            @if(session('success'))
            <div id="successMessage" class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center space-x-2 animate-bounce-in">
                <i class="fas fa-check-circle text-white"></i>
                <span>{{ session('success') }}</span>
            </div>

            <script>
                setTimeout(function() {
                    let msg = document.getElementById('successMessage');
                    if (msg) {
                        msg.style.transition = 'opacity 0.5s ease';
                        msg.style.opacity = '0';
                        setTimeout(function() {
                            msg.remove();
                        }, 500);
                    }
                }, 3000);
            </script>

            <style>
                @keyframes bounceIn {
                    from {
                        opacity: 0;
                        transform: translate(-50%, -100%);
                    }
                    to {
                        opacity: 1;
                        transform: translate(-50%, 0);
                    }
                }
                .animate-bounce-in {
                    animation: bounceIn 0.5s ease-out;
                }
            </style>
            @endif

            <a href="{{ route('categorias.create') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-4 py-2 rounded-lg text-sm inline-block">
                <i class="fas fa-plus mr-2"></i>Nueva Categoría
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($categorias as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $category->description ?? 'Sin descripción' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            
                            <div class="flex items-center space-x-2">
                            <!-- Botón Editar -->
                            <a href="{{ route('categorias.edit', $category->id) }}" 
                            class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <!-- Botón Eliminar -->
                            <form action="{{ route('categorias.destroy', $category->id) }}" method="POST" onsubmit="return confirm('¿Eliminar?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6 pt-4 border-t">
            {{ $categorias->links('pagination::tailwind') }}
        </div>
    </div>

</main>
@endsection