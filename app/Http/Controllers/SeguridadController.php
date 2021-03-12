<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Seguridad;
use App\Pc;

class SeguridadController extends Controller
{
    //GET devuelve un listado de la tabla Seguridads
    public function index(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar')){
                $Seguridad=Seguridad::Where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $Seguridad=Seguridad::all();
            }
            return $Seguridad;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //POST Inserta un registro en la tabla Seguridads
    public function store(Request $request, Departamento $departamento, Pc $pcs)
    {
        if($departamento && $pcs){
            $data = $request->all();
            $Seguridad = new Seguridad($data);
            $pcs->Seguridad()->save($Seguridad);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la Seguridad correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    // GET Muestra un registro de la tabla Seguridads
    public function show(Departamento $departamento, Pc $pcs, Seguridad $Seguridad)
    {
        if($departamento && $pcs && $Seguridad){
            return $Seguridad;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Seguridad no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla Seguridads
    public function update(Request $request, Departamento $departamento, Pc $pcs, Seguridad $Seguridad)
    {
        if($departamento && $pcs && $Seguridad){
            $data=$request->all();
            $Seguridad->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la Seguridad correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Seguridad no existen'
            ],200);
        }
    }

    //DELETE Elimina una registro de la tabla Seguridads
    public function destroy( Departamento $departamento, Pc $pcs, $id)
    {
        if($departamento && $pc){
            Seguridad::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la Seguridad correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Seguridad no existen'
            ],200);
        }
    }
}
