@extends('layout.admin')

@section('content')
<main class="flex items-center justify-center min-h-screen px-4 py-8">
    <div class="w-full max-w-2xl fade-in">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-edit text-white text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">Editar Categoría</h2>
            <p class="text-gray-600">Modifica los datos de la categoría</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <form action="{{ route('categorias.update', $category->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-bookmark mr-2 text-yellow-500"></i>
                        Nombre
                    </label>
                    <input type="text" name="name" value="{{ $category->name }}" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
                
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-align-left mr-2 text-yellow-500"></i>
                        Descripción
                    </label>
                    <textarea name="description" rows="4" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">{{ $category->description }}</textarea>
                </div>
                
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-100">
                    <a href="{{ route('categorias.index') }}" 
                       class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg text-center">
                        <i class="fas fa-times mr-2"></i>Cancelar
                    </a>
                    <button type="submit" 
                            class="bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 text-white px-6 py-3 rounded-lg">
                        <i class="fas fa-save mr-2"></i>Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection