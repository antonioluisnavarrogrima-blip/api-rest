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

        if (! $user || ! Hash::check($request->password, $user->password)) { //Comprobamos que la contraseña del usuario coincida con la de la base de datos
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
}