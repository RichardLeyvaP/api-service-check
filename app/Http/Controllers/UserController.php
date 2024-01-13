<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'msg' => $validator->errors()->all()
                ],400);
            }
            Log::info("obtener el usuario");
            $user = User::where('email',$request->email)->orWhere('name', $request->email)->first();
            Log::info($user);
            if (isset($user->id) ) {
                if(Hash::check($request->password, $user->password)) {
                
                   return response()->json([
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,       
                        'token' => $user->createToken('auth_token')->plainTextToken
                    ],200);
                }else{
                    return response()->json([
                      "msg" => "Contraseña incorrecta"
                   ], 404);
               }
            }else{
                return response()->json([
                    "msg" => "Usuario no registrado"
                ], 404);
            }
        }catch(\Throwable $th){
            return response()->json(['msg' => $th->getMessage().'Error al loguearse'], 500);
        }
    }

    public function userProfile(){
        try{
        return response()->json([
            "msg" => "Acerca del perfil de usuario",
            "data" => auth()->user()
        ]);
    }catch(\Throwable $th){
        return response()->json(['msg' => 'Error al ver los datos del usuario'], 500);
    }
    }

    public function logout(){
        try{
        auth()->user()->tokens()->delete();
        return response()->json([
            "msg" => "Session cerrada correctamente"
        ],200);
        }catch(\Throwable $th){
            return response()->json(['msg' => 'Error al cerrar la session'], 500);
        }
    }

    public function registert(Request $request){
        try{
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|max:50|email|unique:users'
        ]);
        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->all()
            ],400);
        }
        $user = User::create([
            'name' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['msg' => "Client registrado correctamente!!!",
            'user' => $user
        ],201);
        }catch(\Throwable $th){
            return response()->json(['msg' => $th->getMessage().'Error al registrarse'], 500);
        }
    }
}
