@extends('layout.auth')

@section('content')
<!-- Contenido principal -->
    <main class="flex-grow">
        <div class="container mx-auto px-4 py-8 md:py-12 lg:py-16">
            
            <!-- Título principal -->
            <div class="text-center mb-8 md:mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 md:w-20 md:h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mb-4">
                    <i class="fas fa-book-open text-white text-2xl md:text-3xl"></i>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-2">Biblioteca Central</h1>
                <p class="text-gray-600 text-sm md:text-base">Sistema de Gestión de Usuarios</p>
            </div>
            
            <!-- Grid de formularios -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 lg:gap-12 max-w-6xl mx-auto">
                
                <!-- FORMULARIO DE LOGIN -->
                <div class="form-container bg-white rounded-xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 md:px-8 py-4 md:py-5">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-sign-in-alt text-white text-xl md:text-2xl"></i>
                            <h2 class="text-white text-xl md:text-2xl font-bold">Iniciar Sesión</h2>
                        </div>
                        <p class="text-blue-100 text-sm mt-1">Accede a tu cuenta de biblioteca</p>
                    </div>
                    
                    <form id="loginForm" class="p-6 md:p-8 space-y-5 md:space-y-6" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">
                                <i class="fas fa-envelope mr-2 text-blue-600"></i>
                                Correo Electrónico
                            </label>
                            <input type="email" 
                                   name="email"
                                   class="w-full px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   placeholder="usuario@ejemplo.com"
                                   required>
                        </div>
                        
                        <div class="input-group">
                            <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">
                                <i class="fas fa-lock mr-2 text-blue-600"></i>
                                Contraseña
                            </label>
                            <input type="password" 
                                   name="password"
                                   class="w-full px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   placeholder="••••••••"
                                   required>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                            </label>
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800 transition-colors">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-2 md:py-3 rounded-lg transition-all duration-300 transform hover:scale-[1.02]">
                            <i class="fas fa-arrow-right-to-bracket mr-2"></i>
                            Iniciar Sesión
                        </button>
                        
                        <p class="text-center text-gray-600 text-sm mt-4">
                            ¿No tienes una cuenta? 
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors">
                                Regístrate aquí
                            </a>
                        </p>
                    </form>
                </div>
                
                <!-- FORMULARIO DE REGISTRO -->
                <div class="form-container bg-white rounded-xl shadow-2xl overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 md:px-8 py-4 md:py-5">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-user-plus text-white text-xl md:text-2xl"></i>
                            <h2 class="text-white text-xl md:text-2xl font-bold">Crear Cuenta</h2>
                        </div>
                        <p class="text-purple-100 text-sm mt-1">Regístrate para acceder a todos los servicios</p>
                    </div>
                    
                    <form id ="registerForm" class="p-6 md:p-8 space-y-5 md:space-y-6" method="POST" action="{{ route('register') }}">
                            @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-5">
                            <div class="input-group">
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">
                                    <i class="fas fa-user mr-2 text-purple-600"></i>
                                    Nombre
                                </label>
                                <input type="text" 
                                       name="name"
                                       class="w-full px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                       placeholder="Tu nombre"
                                       required>
                            </div>
                            
                            <div class="input-group">
                                <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">
                                    <i class="fas fa-user mr-2 text-purple-600"></i>
                                Correo Electrónico
                            </label>
                            <input type="email" 
                                   name="email"
                                   class="w-full px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="usuario@ejemplo.com"
                                   required>
                        </div>
                        
                        <div class="input-group">
                            <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">
                                <i class="fas fa-lock mr-2 text-purple-600"></i>
                                Contraseña
                            </label>
                            <input type="password" 
                                   name="password"
                                   class="w-full px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="Crea una contraseña segura"
                                   required>
                            <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres</p>
                        </div>
                        
                        <div class="input-group">
                            <label class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">
                                <i class="fas fa-check-circle mr-2 text-purple-600"></i>
                                Repetir Contraseña
                            </label>
                            <input type="password" 
                                   name="password_confirmation"
                                   class="w-full px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                   placeholder="Confirma tu contraseña"
                                   required>
                        </div>
                        
                        <div class="flex items-start space-x-2">
                            <input type="checkbox" 
                                   class="mt-1 rounded border-gray-300 text-purple-600 focus:ring-purple-500"
                                   required>
                            <label class="text-xs md:text-sm text-gray-600">
                                Acepto los 
                                <a href="#" class="text-purple-600 hover:text-purple-800 transition-colors">Términos y Condiciones</a> 
                                y la 
                                <a href="#" class="text-purple-600 hover:text-purple-800 transition-colors">Política de Privacidad</a>
                            </label>
                        </div>
                        
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white font-bold py-2 md:py-3 rounded-lg transition-all duration-300 transform hover:scale-[1.02]">
                            <i class="fas fa-user-plus mr-2"></i>
                            Registrarse
                        </button>
                        
                        <p class="text-center text-gray-600 text-sm mt-4">
                            ¿Ya tienes una cuenta? 
                            <a href="#" class="text-purple-600 hover:text-purple-800 font-semibold transition-colors">
                                Inicia sesión aquí
                            </a>
                        </p>
                    </form>
                </div>
                
            </div>
        </div>
    </main>
    @endsection