@extends('layout.admin')

@section('content')
<main class="container mx-auto px-4 py-8 fade-in">
    
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-exchange-alt text-white text-2xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-gray-800">Nuevo Préstamo</h2>
            <p class="text-gray-600">Registra un nuevo préstamo de libro</p>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('prestamos.store') }}" method="POST" class="p-6" id="prestamoForm">
                @csrf
                
                
                <!-- Paso 1: Buscar Usuario -->
                <div id="paso1">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-user mr-2 text-blue-500"></i>
                            Buscar Usuario
                        </label>
                        <input type="text" id="buscarUsuario" placeholder="Escribe ID, nombre o email del usuario..." 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <div id="resultadoUsuarios" class="mt-2 border rounded-lg hidden"></div>
                        <input type="hidden" name="usuario_id" id="usuario_id" required>
                        <div id="usuarioSeleccionado" class="mt-2 text-green-600 text-sm hidden">
                            <i class="fas fa-check-circle"></i> Usuario seleccionado: <span id="nombreUsuario"></span>
                            <button type="button" id="btnCambiarUsuario" class="ml-3 text-red-500 hover:text-red-700 text-xs underline">
                                Cambiar
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="button" id="btnSiguienteUsuario" class="bg-blue-600 text-white px-4 py-2 rounded-lg hidden">
                            Siguiente → 
                        </button>
                    </div>
                </div>

                <!-- Paso 2: Buscar Libro (oculto inicialmente) -->
                <div id="paso2" class="hidden">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-book mr-2 text-green-500"></i>
                            Buscar Libro
                        </label>
                        <input type="text" id="buscarLibro" placeholder="Escribe ID, nombre o autor del libro..." 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        <div id="resultadoLibros" class="mt-2 border rounded-lg hidden"></div>
                        <input type="hidden" name="libro_id" id="libro_id" required>
                        <div id="libroSeleccionado" class="mt-2 text-green-600 text-sm hidden">
                            <i class="fas fa-check-circle"></i> Libro seleccionado: <span id="nombreLibro"></span>
                            <button type="button" id="btnCambiarLibro" class="ml-3 text-red-500 hover:text-red-700 text-xs underline">
                                Cambiar
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex justify-between">
                        <button type="button" id="btnAtrasUsuario" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                            ← Atrás
                        </button>
                        <button type="button" id="btnSiguienteLibro" class="bg-blue-600 text-white px-4 py-2 rounded-lg hidden">
                            Siguiente → 
                        </button>
                    </div>
                </div>

                <!-- Paso 3: Fecha y Estado (oculto inicialmente) -->
                <div id="paso3" class="hidden">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-calendar-alt mr-2 text-purple-500"></i>
                            Fecha de Entrega
                        </label>
                        <input type="date" name="fecha_entrega" id="fecha_entrega" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-tag mr-2 text-purple-500"></i>
                            Estado
                        </label>
                        <select name="estado" id="estado" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="activo">Activo</option>
                            <option value="devuelto">Devuelto</option>
                            <option value="vencido">Vencido</option>
                        </select>
                    </div>
                    
                    <div class="flex justify-between">
                        <button type="button" id="btnAtrasLibro" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                            ← Atrás
                        </button>
                        <button type="submit" id="btnGuardar" disabled
                                class="bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed">
                            <i class="fas fa-save mr-2"></i>Guardar Préstamo
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</main>

<script>
    // Variables
    let usuarioSeleccionadoFlag = false;
    let libroSeleccionadoFlag = false;

    // Elementos
    const paso1 = document.getElementById('paso1');
    const paso2 = document.getElementById('paso2');
    const paso3 = document.getElementById('paso3');
    const btnSiguienteUsuario = document.getElementById('btnSiguienteUsuario');
    const btnSiguienteLibro = document.getElementById('btnSiguienteLibro');
    const btnAtrasUsuario = document.getElementById('btnAtrasUsuario');
    const btnAtrasLibro = document.getElementById('btnAtrasLibro');
    const btnGuardar = document.getElementById('btnGuardar');

    // Buscar Usuarios
    const buscarUsuario = document.getElementById('buscarUsuario');
    const resultadoUsuarios = document.getElementById('resultadoUsuarios');
    const usuarioId = document.getElementById('usuario_id');
    const usuarioSeleccionadoDiv = document.getElementById('usuarioSeleccionado');
    const nombreUsuario = document.getElementById('nombreUsuario');

    buscarUsuario.addEventListener('input', function() {
        let query = this.value;
        if (query.length > 0) {
            fetch(`/prestamo/buscar/usuarios?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        resultadoUsuarios.classList.remove('hidden');
                        resultadoUsuarios.innerHTML = data.map(user => `
                            <div class="p-2 hover:bg-blue-50 cursor-pointer border-b" onclick="seleccionarUsuario(${user.id}, '${user.name}')">
                                <strong>ID: ${user.id}</strong> - ${user.name} (${user.email})
                            </div>
                        `).join('');
                    } else {
                        resultadoUsuarios.classList.add('hidden');
                    }
                });
        } else {
            resultadoUsuarios.classList.add('hidden');
        }
    });

    window.seleccionarUsuario = function(id, name) {
        usuarioId.value = id;
        nombreUsuario.innerText = `${id} - ${name}`;
        usuarioSeleccionadoDiv.classList.remove('hidden');
        resultadoUsuarios.classList.add('hidden');
        buscarUsuario.value = `${id} - ${name}`;
        buscarUsuario.disabled = true;
        usuarioSeleccionadoFlag = true;
        btnSiguienteUsuario.classList.remove('hidden');
    }

    // Cambiar usuario
    const btnCambiarUsuario = document.getElementById('btnCambiarUsuario');
    if (btnCambiarUsuario) {
        btnCambiarUsuario.addEventListener('click', function() {
            usuarioId.value = '';
            buscarUsuario.value = '';
            buscarUsuario.disabled = false;
            usuarioSeleccionadoDiv.classList.add('hidden');
            usuarioSeleccionadoFlag = false;
            btnSiguienteUsuario.classList.add('hidden');
            buscarUsuario.focus();
        });
    }

    btnSiguienteUsuario.addEventListener('click', function() {
        paso1.classList.add('hidden');
        paso2.classList.remove('hidden');
    });

    btnAtrasUsuario.addEventListener('click', function() {
        paso2.classList.add('hidden');
        paso1.classList.remove('hidden');
    });

    // Buscar Libros
    const buscarLibro = document.getElementById('buscarLibro');
    const resultadoLibros = document.getElementById('resultadoLibros');
    const libroId = document.getElementById('libro_id');
    const libroSeleccionadoDiv = document.getElementById('libroSeleccionado');
    const nombreLibro = document.getElementById('nombreLibro');

    buscarLibro.addEventListener('input', function() {
        let query = this.value;
        if (query.length > 0) {
            fetch(`/prestamo/buscar/libros?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        resultadoLibros.classList.remove('hidden');
                        resultadoLibros.innerHTML = data.map(book => `
                            <div class="p-2 hover:bg-green-50 cursor-pointer border-b" onclick="seleccionarLibro(${book.id}, '${book.nombre} - ${book.autor}')">
                                <strong>ID: ${book.id}</strong> - ${book.nombre} (${book.autor})
                            </div>
                        `).join('');
                    } else {
                        resultadoLibros.classList.add('hidden');
                    }
                });
        } else {
            resultadoLibros.classList.add('hidden');
        }
    });

    window.seleccionarLibro = function(id, name) {
        libroId.value = id;
        nombreLibro.innerText = name;
        libroSeleccionadoDiv.classList.remove('hidden');
        resultadoLibros.classList.add('hidden');
        buscarLibro.value = name;
        buscarLibro.disabled = true;
        libroSeleccionadoFlag = true;
        btnSiguienteLibro.classList.remove('hidden');
    }

    // Cambiar libro
    const btnCambiarLibro = document.getElementById('btnCambiarLibro');
    if (btnCambiarLibro) {
        btnCambiarLibro.addEventListener('click', function() {
            libroId.value = '';
            buscarLibro.value = '';
            buscarLibro.disabled = false;
            libroSeleccionadoDiv.classList.add('hidden');
            libroSeleccionadoFlag = false;
            btnSiguienteLibro.classList.add('hidden');
            buscarLibro.focus();
        });
    }

    btnSiguienteLibro.addEventListener('click', function() {
        paso2.classList.add('hidden');
        paso3.classList.remove('hidden');
    });

    btnAtrasLibro.addEventListener('click', function() {
        paso3.classList.add('hidden');
        paso2.classList.remove('hidden');
    });

    // Verificar formulario completo
    const fechaEntrega = document.getElementById('fecha_entrega');
    const estado = document.getElementById('estado');

    function verificarFormulario() {
        if (usuarioId.value && libroId.value && fechaEntrega.value && estado.value) {
            btnGuardar.disabled = false;
            btnGuardar.classList.remove('bg-gray-400', 'cursor-not-allowed');
            btnGuardar.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'hover:from-blue-700', 'hover:to-purple-700');
        } else {
            btnGuardar.disabled = true;
            btnGuardar.classList.add('bg-gray-400', 'cursor-not-allowed');
            btnGuardar.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-purple-600');
        }
    }

    fechaEntrega.addEventListener('change', verificarFormulario);
    estado.addEventListener('change', verificarFormulario);
</script>
@endsection