@extends('layout.admin')

@section('content')
<main class="container mx-auto px-4 py-8 fade-in">
    
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Nuevo Usuario</h2>
            <p class="text-gray-600">Completa los datos para agregar un nuevo usuario</p>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('usuarios.store') }}" method="POST" class="p-6">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-user mr-2 text-blue-500"></i>
                        Nombre
                    </label>
                    <input type="text" name="name" required value="{{ old('name') }}" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Ej: Juan Pérez">
                           @error('name')
                               <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                           @enderror
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>
                        Email
                    </label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="ejemplo@correo.com">
                           @error('email')
                               <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                           @enderror
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-lock mr-2 text-blue-500"></i>
                        Contraseña
                    </label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="********">
                           @error('password')
                               <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                           @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-lock mr-2 text-blue-500"></i>
                        Confirmar Contraseña
                    </label>
                    <input type="password" name="password_confirmation" required 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="********">
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">
                        <i class="fas fa-tag mr-2 text-blue-500"></i>
                        Tipo de Usuario
                    </label>
                    <select name="user_type" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="user">Usuario</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <a href="{{ route('usuarios.index') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-save mr-2"></i>Guardar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>
@endsection