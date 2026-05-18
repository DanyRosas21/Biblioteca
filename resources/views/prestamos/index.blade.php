@extends('layout.admin')

@section('content')
<main class="container mx-auto px-4 py-8 fade-in">
    
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Préstamos</h2>
            <p class="text-gray-600">Gestiona los préstamos de libros</p>
        </div>
        <a href="{{ route('prestamos.create') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-4 py-2 rounded-lg text-sm">
            <i class="fas fa-plus-circle mr-2"></i>Nuevo Préstamo
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800">Lista de Préstamos</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Libro</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha Entrega</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($prestamos as $prestamo)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $prestamo->id }}</td>
                    <td class="px-6 py-4 font-medium">{{ $prestamo->usuario->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $prestamo->libro->nombre ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $prestamo->fecha_entrega ?? 'N/A' }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $prestamo->estado == 'activo' ? 'bg-green-100 text-green-800' : 
                            ($prestamo->estado == 'vencido' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800') }}">
                            {{ $prestamo->estado == 'activo' ? 'Activo' : ($prestamo->estado == 'vencido' ? 'Vencido' : 'Devuelto') }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            @if($prestamo->estado == 'activo')
                            <a href="{{ route('prestamos.entregar', $prestamo->id) }}" class="text-green-600 hover:text-green-900">
                                <i class="fas fa-check-circle"></i> Entregar
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                        No hay préstamos registrados
                    </td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $prestamos->links('pagination::tailwind') }}
        </div>
    </div>

</main>
@endsection