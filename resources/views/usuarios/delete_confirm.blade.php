@extends('layout.admin')

@section('content')
<main class="flex items-center justify-center min-h-screen px-4 py-8">
    <div class="max-w-md w-full fade-in">
        <div class="bg-white rounded-xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-red-600 to-red-700 px-6 py-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                    <h2 class="text-white text-xl font-bold">Eliminar Usuario</h2>
                </div>
                <p class="text-red-100 text-sm mt-1">Esta acción no se puede deshacer</p>
            </div>
            
            <div class="p-6">
                <div class="text-center mb-6">
                    <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-slash text-red-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">¿Eliminar este usuario?</h3>
                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                        <p class="text-gray-700"><strong>Nombre:</strong> {{ $user->name }}</p>
                        <p class="text-gray-700"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="text-gray-700"><strong>Tipo:</strong> {{ $user->user_type == 'admin' ? 'Administrador' : 'Usuario' }}</p>
                    </div>
                    <p class="text-gray-500 text-sm">El usuario será eliminado permanentemente.</p>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <a href="{{ route('usuarios.index') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
                        Cancelar
                    </a>
                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
                            <i class="fas fa-trash mr-2"></i>Sí, eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection