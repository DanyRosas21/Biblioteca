@extends('layout.admin')

@section('content')
<main class="container mx-auto px-4 py-8 fade-in">
    
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Editar Usuario</h2>
            <p class="text-gray-600">Modifica los datos del usuario</p>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-user mr-2 text-yellow-500"></i>
                        Nombre
                    </label>
                    <input type="text" name="name" value="{{ $usuario->name }}" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-envelope mr-2 text-yellow-500"></i>
                        Email
                    </label>
                    <input type="email" name="email" value="{{ $usuario->email }}" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-tag mr-2 text-yellow-500"></i>
                        Tipo de Usuario
                    </label>
                    <select name="user_type" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option value="user" {{ $usuario->user_type == 'user' ? 'selected' : '' }}>Usuario</option>
                        <option value="admin" {{ $usuario->user_type == 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <a href="{{ route('usuarios.index') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-save mr-2"></i>Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>
@endsection