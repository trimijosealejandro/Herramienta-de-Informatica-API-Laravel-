<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Soporte;
use App\Pc;

class SoporteController extends Controller
{
    //GET devuelve un listado de la tabla Soportes
    public function index(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar')){
                $Soporte=Soporte::Where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $Soporte=Soporte::all();
            }
            return $Soporte;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //POST Inserta un registro en la tabla Soportes
    public function store(Request $request, Departamento $departamento, Pc $pcs)
    {
        if($departamento && $pcs){
            $data = $request->all();
            $Soporte = new Soporte($data);
            $pcs->Soporte()->save($Soporte);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la Soporte correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    // GET Muestra un registro de la tabla Soportes
    public function show(Departamento $departamento, Pc $pcs, Soporte $Soporte)
    {
        if($departamento && $pcs && $Soporte){
            return $Soporte;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Soporte no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla Soportes
    public function update(Request $request, Departamento $departamento, Pc $pcs, Soporte $Soporte)
    {
        if($departamento && $pcs && $Soporte){
            $data=$request->all();
            $Soporte->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la Soporte correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Soporte no existen'
            ],200);
        }
    }

    //DELETE Elimina una registro de la tabla Soportes
    public function destroy( Departamento $departamento, Pc $pcs, $id)
    {
        if($departamento && $pc){
            Soporte::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la Soporte correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Soporte no existen'
            ],200);
        }
    }
}
