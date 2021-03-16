<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Inspeccion;
use App\Pc;

class InspeccionController extends Controller
{
    //GET devuelve un listado de la tabla Inspeccions
    public function index(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar')){
                $Inspeccion=Inspeccion::Where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $Inspeccion=Inspeccion::all();
            }
            return $Inspeccion;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //POST Inserta un registro en la tabla Inspeccions
    public function store(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            $data = $request->all();
            $Inspeccion = new Inspeccion($data);
            $pc->Inspeccion()->save($Inspeccion);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la Inspeccion correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    // GET Muestra un registro de la tabla Inspeccions
    public function show(Departamento $departamento, Pc $pc, Inspeccion $inspeccion)
    {
        if($departamento && $pc && $inspeccion){
            return $inspeccion;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Inspeccion no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla Inspeccions
    public function update(Request $request, Departamento $departamento, Pc $pc, Inspeccion $inspeccion)
    {
        if($departamento && $pc && $inspeccion){
            $data=$request->all();
            $inspeccion->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la Inspeccion correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Inspeccion no existen'
            ],200);
        }
    }

    //DELETE Elimina una registro de la tabla Inspeccions
    public function destroy( Departamento $departamento, Pc $pc, $id)
    {
        if($departamento && $pc){
            Inspeccion::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la Inspeccion correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Inspeccion no existen'
            ],200);
        }
    }
}
