@extends('layout.admin')

@section('content')

<main class="flex items-center justify-center min-h-screen px-4 py-8">
    
    <div class="w-full max-w-2xl fade-in">
        <!-- Título -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-tag text-white text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">Nueva Categoría</h2>
            <p class="text-gray-600">Completa los datos para crear una nueva categoría</p>
        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <form action="{{ route('categorias.store') }}" method="POST" class="p-8">
                @csrf
                
                <!-- Campo Nombre -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-bookmark mr-2 text-blue-500"></i>
                        Nombre
                    </label>
                    <input type="text" name="name" id="name" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Ej: Literatura, Ciencia, Historia...">
                </div>
                
                <!-- Campo Descripción -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-align-left mr-2 text-blue-500"></i>
                        Descripción
                    </label>
                    <textarea name="description" id="description" rows="4" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Describe brevemente esta categoría..."></textarea>
                </div>
                
                <!-- Botones -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('categorias.index') }}" 
                       class="order-2 sm:order-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-3 rounded-lg transition text-center">
                        <i class="fas fa-times mr-2"></i>Cancelar
                    </a>
                    <button type="submit" 
                            class="order-1 sm:order-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium px-6 py-3 rounded-lg transition shadow-md hover:shadow-lg">
                        <i class="fas fa-save mr-2"></i>Guardar Categoría
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>

@endsection