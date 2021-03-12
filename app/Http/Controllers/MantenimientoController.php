<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Mantenimiento;
use App\Pc;

class MantenimientoController extends Controller
{
    //GET devuelve un listado de la tabla Mantenimientos
    public function index(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar')){
                $Mantenimiento=Mantenimiento::Where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $Mantenimiento=Mantenimiento::all();
            }
            return $Mantenimiento;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //POST Inserta un registro en la tabla Mantenimientos
    public function store(Request $request, Departamento $departamento, Pc $pcs)
    {
        if($departamento && $pcs){
            $data = $request->all();
            $Mantenimiento = new Mantenimiento($data);
            $pcs->Mantenimiento()->save($Mantenimiento);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la Mantenimiento correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    // GET Muestra un registro de la tabla Mantenimientos
    public function show(Departamento $departamento, Pc $pcs, Mantenimiento $Mantenimiento)
    {
        if($departamento && $pcs && $Mantenimiento){
            return $Mantenimiento;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Mantenimiento no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla Mantenimientos
    public function update(Request $request, Departamento $departamento, Pc $pcs, Mantenimiento $Mantenimiento)
    {
        if($departamento && $pcs && $Mantenimiento){
            $data=$request->all();
            $Mantenimiento->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la Mantenimiento correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Mantenimiento no existen'
            ],200);
        }
    }

    //DELETE Elimina una registro de la tabla Mantenimientos
    public function destroy( Departamento $departamento, Pc $pcs, $id)
    {
        if($departamento && $pc){
            Mantenimiento::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la Mantenimiento correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Mantenimiento no existen'
            ],200);
        }
    }
}
