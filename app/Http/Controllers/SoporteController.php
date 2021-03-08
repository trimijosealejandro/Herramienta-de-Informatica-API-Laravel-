<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Soporte;
use App\Pc;

class SoporteController extends Controller
{
    //Listado de la tabla soporte con filtro entrado por parametro
    public function index( Request $request, Departamento $departamento, Pc $pc)
    {
        if( $departamento && $pc){
            if($request->has('txtBuscar'))
            {
             $soporte=Soporte::Where('name','like','%'.$request->txtBuscar.'%')
                ->get();
            }else
            {
             $soporte=Soporte::all();
            }
            return $soporte;
        }else
        {
            response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

   //Adiciona un registro en la tabla soporte
   public function store(Request $request, Departamento $departamento, Pc $pc)
   {
       if( $departamento &&  $pc){
           $data=$request->all();

         $soporte = new Soporte([
            'name'=>$data['name']
           ]);

         $pc->soporte()->save($soporte);

            return response()->json([
                'res'=>true,
                'message'=>'Creada el soporte correctamente'
            ],200);
       }else
       {
           response()->json([
               'res'=>false,
               'message'=>'El departamento o la pc no existen'
           ],200);
       }

   }

    //Devuelve un registro de la tabla soporte
    public function show(Departamento $departamento, Pc $pc, Soporte $soporte)
    {
        if( $departamento &&  $pc &&  $soporte){
            return $soporte;
        }else
        {
            response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

     //Actualiza un registro de la tabla soporte
     public function update(Request $request, Departamento $departamento, Pc $pc, Soporte $soporte)
     {
         if( $departamento &&  $pc){
             $data=$request->all();
             $soporte->update($data);
             return response()->json([
                 'res'=>true,
                 'message'=>'Actualizada el soporte correctamente'
             ],200);
         }else
         {
             response()->json([
                 'res'=>false,
                 'message'=>'El departamento o la pc no existen'
             ],200);
         }
     }

    //Elimina un registro de la tabla soporte
    public function destroy(Departamento $departamento, Pc $pc, $id)
    {
        if( $departamento &&  $pc){
            Soporte::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada el soporte correctamente'
            ],200);
        }else
        {
            response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }
}
