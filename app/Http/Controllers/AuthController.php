<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function register()
    {
        #Validar los datos de registro
        $validatedData = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8', 
        ]);

        #Crear el usuario
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'username' => $validatedData['email'],
            'user_type' => 'user',
        ]);

        #Redirigir o iniciar sesión automáticamente
        auth()->login($user);
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        #Validar los datos de inicio de sesión
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        #Intentar iniciar sesión
        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
