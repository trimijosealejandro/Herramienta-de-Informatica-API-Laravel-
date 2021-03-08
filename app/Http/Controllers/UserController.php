<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
            $data=$request->all();
            $data['password'] = Hash::make($request->password);
            $data['api_token']= Str::random(100);
            User::create($data);

            return response()->json([
                'res'=>true,
                'api_token'=>$data['api_token'],
                'message'=>'Creado el usuario correctamente'
            ], 200);
    }

    public function login(Request $request){
        $user=User::whereEmail($request->email)->first();
        if(!is_null($user) && Hash::check($request->password, $user->password)){
            $user['api_token']= Str::random(100);
            $user->save();
            return response()->json([
                'res'=>true,
                'api_token'=>$user->api_token,
                'message'=>'Bienvenido al sistema'
            ], 200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'correo o password invalidos'
            ], 200);
        }
    }

    public function logout(){
        $user=auth()->user()    ;
        $user->api_token=null;
        $user->save();
        return response()->json([
            'res'=>true,
            'message'=>'Adios'
        ], 200);
    }
}
