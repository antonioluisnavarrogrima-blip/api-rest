<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([ //Validamos el formato de entradoa
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first(); //Iniciamos con el primer usuario que coincida dandole a la variable el objeto

        if (!$user || !Hash::check($request->password, $user->password)) { //Comprobamos que la contraseña del usuario coincida con la de la base de datos
            return response()->json(['message' => 'Credenciales incorrectas'], 401); //Devolvemos un error si algo fue mal
        }

        $token = $user->createToken('token_de_acceso')->plainTextToken; //creamos un token en texto plano

        return response()->json([ //Se lo damos (el token)
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
        //Respondemos el json
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete(); //Borramos su token y devolvemos un json con mensaje de éxito

        return response()->json(['message' => 'Sesión cerrada'], 200);
    }
    public function register(Request $request)
    { //Validamos la entrada de datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        //Creamos un objeto de tipo user y un token de acceso

        $user = User::create($validated); // User ya tiene 'password' => 'hashed' en casts()
        $token = $user->createToken('token_de_acceso')->plainTextToken;
        
        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }
}