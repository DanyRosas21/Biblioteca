@extends('layout.admin')

@section('content')
<main class="flex items-center justify-center min-h-screen px-4 py-8">
    
    <div class="w-full max-w-2xl fade-in">
        <!-- Título con icono -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-book text-white text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">Nuevo Libro</h2>
            <p class="text-gray-600">Completa los datos para agregar un nuevo libro</p>
        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <form action="{{ route('libros.store') }}" method="POST" class="p-6">
                @csrf
                
                <!-- Campo Nombre -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-bookmark mr-2 text-blue-500"></i>
                        Nombre del Libro
                    </label>
                    <input type="text" name="nombre" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Ej: Cien años de soledad">
                </div>
                
                <!-- Campo ISBN -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-barcode mr-2 text-blue-500"></i>
                        ISBN
                    </label>
                    <input type="text" name="isbn" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="978-0307474728">
                </div>
                
                <!-- Campo Autor -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-user-pen mr-2 text-blue-500"></i>
                        Autor
                    </label>
                    <input type="text" name="autor" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Ej: Gabriel García Márquez">
                </div>
                
                <!-- Campo Editorial -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-building mr-2 text-blue-500"></i>
                        Editorial
                    </label>
                    <input type="text" name="editorial" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Ej: Sudamericana">
                </div>
                
                <!-- Campo Categoría -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-tag mr-2 text-blue-500"></i>
                        Categoría
                    </label>
                    <select name="category_id" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Selecciona una categoría</option>
                        @foreach($categorias as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Botones -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('home') }}" 
                       class="order-2 sm:order-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-5 py-2 rounded-lg transition text-center">
                        <i class="fas fa-times mr-2"></i>Cancelar
                    </a>
                    <button type="submit" 
                            class="order-1 sm:order-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium px-5 py-2 rounded-lg transition shadow-md hover:shadow-lg">
                        <i class="fas fa-save mr-2"></i>Guardar Libro
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>
@endsection