<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Incidencia;
use App\Pc;

class IncidenciaController extends Controller
{
    //GET devuelve un listado de la tabla Incidencias
    public function index(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar')){
                $Incidencia=Incidencia::Where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $Incidencia=Incidencia::all();
            }
            return $Incidencia;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //POST Inserta un registro en la tabla Incidencias
    public function store(Request $request, Departamento $departamento, Pc $pcs)
    {
        if($departamento && $pcs){
            $data = $request->all();
            $Incidencia = new Incidencia($data);
            $pcs->Incidencia()->save($Incidencia);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la Incidencia correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    // GET Muestra un registro de la tabla Incidencias
    public function show(Departamento $departamento, Pc $pcs, Incidencia $Incidencia)
    {
        if($departamento && $pcs && $Incidencia){
            return $Incidencia;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Incidencia no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla Incidencias
    public function update(Request $request, Departamento $departamento, Pc $pcs, Incidencia $Incidencia)
    {
        if($departamento && $pcs && $Incidencia){
            $data=$request->all();
            $Incidencia->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la Incidencia correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Incidencia no existen'
            ],200);
        }
    }

    //DELETE Elimina una registro de la tabla Incidencias
    public function destroy( Departamento $departamento, Pc $pcs, $id)
    {
        if($departamento && $pc){
            Incidencia::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la Incidencia correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Incidencia no existen'
            ],200);
        }
    }
}
