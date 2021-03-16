<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Inspeccion;
use App\Pc;

class InspeccionController extends Controller
{
    //GET devuelve un listado de la tabla inspeccions
    public function index(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar')){
                $inspeccion=Inspeccion::Where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $inspeccion=Inspeccion::all();
            }
            return $inspeccion;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //POST Inserta un registro en la tabla inspeccions
    public function store(Request $request, Departamento $departamento, Pc $pcs)
    {
        if($departamento && $pcs){
            $data = $request->all();
            $inspeccion = new Inspeccion($data);
            $pcs->inspeccion()->save($inspeccion);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la inspeccion correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    // GET Muestra un registro de la tabla inspeccions
    public function show(Departamento $departamento, Pc $pcs, Inspeccion $inspeccion)
    {
        if($departamento && $pcs && $inspeccion){
            return $inspeccion;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la inspeccion no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla inspeccions
    public function update(Request $request, Departamento $departamento, Pc $pcs, Inspeccion $inspeccion)
    {
        if($departamento && $pcs && $inspeccion){
            $data=$request->all();
            $inspeccion->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la inspeccion correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la inspeccion no existen'
            ],200);
        }
    }

    //DELETE Elimina una registro de la tabla inspeccions
    public function destroy( Departamento $departamento, Pc $pcs, $id)
    {
        if($departamento && $pc){
            Inspeccion::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la inspeccion correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la inspeccion no existen'
            ],200);
        }
    }
}
