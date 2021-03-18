<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
    public function register (Request $request){
        $user=$request->all();
        $user['password'] = Hash::make($request->password);
        User::create($user);

        return response()->json([
            'res'=>true,
            'message'=>'Creado el usuario correctamente'
        ],200);
    }

    public function login (Request $request){
        $user=User::whereEmail($request->email)->first();

        if(!is_null($user) && Hash::check($request->password, $user->password) ){
            $user->api_token = Str::random(100);
            $user->save();
            return response()->json([
                    'res'=>true,
                    'api_token'=>$user->api_token,
                    'message'=>'Bienvenido'
                ],200);
            }else{
                return response()->json([
                    'res'=>false,
                    'message'=>'Usuario o password incorrecto'
                ],200);
            }
        }


    public function logout (){
        $user=auth()->user();
        $user->api_token= null;
        $user->save();
        return response()->json([
            'res'=>true,
            'message'=>'Adios'
        ],200);
    }
}


