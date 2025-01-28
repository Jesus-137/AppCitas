<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function registro(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);
    
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password'])
        ]);
    
        $token = $user->createToken('authToken')->plainTextToken;
    
        return response()->json([
            'status' => 'success',
            'message' => 'Registro exitoso',
            'token' => $token,
            'user' => $user
        ], 201);
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',  // Verifica que sea un email válido
            'password' => 'required|min:8'  // La contraseña debe tener al menos 8 caracteres
        ]);
        error_log("Mensaje de depuración en consola del navegadores");
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se pudo autenticar el usuario.'
                ], 401);
            }
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Login exitoso',
                'token' => $token,
                'user' => $user
            ], 202);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Credenciales incorrectas'
        ], 401);
    }

}
