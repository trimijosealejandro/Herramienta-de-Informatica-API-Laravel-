<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Software;
use App\Pc;

class SoftwareController extends Controller
{
  //Listado de la tabla Software con filtro entrado por parametro
  public function index( Request $request, Departamento $departamento, Pc $pc)
  {
      if( $departamento && $pc){
          if($request->has('txtBuscar'))
          {
           $Software=Software::Where('name','like','%'.$request->txtBuscar.'%')
              ->get();
          }else
          {
           $Software=Software::all();
          }
          return $Software;
      }else
      {
          response()->json([
              'res'=>false,
              'message'=>'El departamento o la pc no existen'
          ],200);
      }
  }

 //Adiciona un registro en la tabla Software
 public function store(Request $request, Departamento $departamento, Pc $pc)
 {
     if( $departamento &&  $pc){
         $data=$request->all();

       $Software = new Software([
          'name'=>$data['name']
         ]);

       $pc->Software()->save($Software);

          return response()->json([
              'res'=>true,
              'message'=>'Creada el Software correctamente'
          ],200);
     }else
     {
         response()->json([
             'res'=>false,
             'message'=>'El departamento o la pc no existen'
         ],200);
     }

 }

  //Devuelve un registro de la tabla Software
  public function show(Departamento $departamento, Pc $pc, Software $Software)
  {
      if( $departamento &&  $pc &&  $Software){
          return $Software;
      }else
      {
          response()->json([
              'res'=>false,
              'message'=>'El departamento o la pc no existen'
          ],200);
      }
  }

   //Actualiza un registro de la tabla Software
   public function update(Request $request, Departamento $departamento, Pc $pc, Software $Software)
   {
       if( $departamento &&  $pc && $Software){
           $data=$request->all();
           $Software->update($data);
           return response()->json([
               'res'=>true,
               'message'=>'Actualizada el Software correctamente'
           ],200);
       }else
       {
           response()->json([
               'res'=>false,
               'message'=>'El departamento o la pc no existen'
           ],200);
       }
   }

  //Elimina un registro de la tabla Software
  public function destroy(Departamento $departamento, Pc $pc, $id)
  {
      if( $departamento &&  $pc){
          Software::destroy($id);
          return response()->json([
              'res'=>true,
              'message'=>'Eliminada el Software correctamente'
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
