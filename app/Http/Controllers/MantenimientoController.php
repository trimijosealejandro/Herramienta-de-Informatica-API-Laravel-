<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Mantenimiento;
use App\Pc;
class MantenimientoController extends Controller
{
   //Listado de la tabla Mantenimiento con filtro entrado por parametro
  public function index( Request $request, Departamento $departamento, Pc $pc)
  {
      if( $departamento && $pc){
          if($request->has('txtBuscar'))
          {
           $Mantenimiento=Mantenimiento::Where('name','like','%'.$request->txtBuscar.'%')
              ->get();
          }else
          {
           $Mantenimiento=Mantenimiento::all();
          }
          return $Mantenimiento;
      }else
      {
          response()->json([
              'res'=>false,
              'message'=>'El departamento o la pc no existen'
          ],200);
      }
  }

 //Adiciona un registro en la tabla Mantenimiento
 public function store(Request $request, Departamento $departamento, Pc $pc)
 {
     if( $departamento &&  $pc){
         $data=$request->all();

       $Mantenimiento = new Mantenimiento([
          'name'=>$data['name']
         ]);

       $pc->Mantenimiento()->save($Mantenimiento);

          return response()->json([
              'res'=>true,
              'message'=>'Creada el Mantenimiento correctamente'
          ],200);
     }else
     {
         response()->json([
             'res'=>false,
             'message'=>'El departamento o la pc no existen'
         ],200);
     }

 }

  //Devuelve un registro de la tabla Mantenimiento
  public function show(Departamento $departamento, Pc $pc, Mantenimiento $Mantenimiento)
  {
      if( $departamento &&  $pc &&  $Mantenimiento){
          return $Mantenimiento;
      }else
      {
          response()->json([
              'res'=>false,
              'message'=>'El departamento o la pc no existen'
          ],200);
      }
  }

   //Actualiza un registro de la tabla Mantenimiento
   public function update(Request $request, Departamento $departamento, Pc $pc, Mantenimiento $Mantenimiento)
   {
       if( $departamento &&  $pc && $Mantenimiento){
           $data=$request->all();
           $Mantenimiento->update($data);
           return response()->json([
               'res'=>true,
               'message'=>'Actualizada el Mantenimiento correctamente'
           ],200);
       }else
       {
           response()->json([
               'res'=>false,
               'message'=>'El departamento o la pc no existen'
           ],200);
       }
   }

  //Elimina un registro de la tabla Mantenimiento
  public function destroy(Departamento $departamento, Pc $pc, $id)
  {
      if( $departamento &&  $pc){
          Mantenimiento::destroy($id);
          return response()->json([
              'res'=>true,
              'message'=>'Eliminada el Mantenimiento correctamente'
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
