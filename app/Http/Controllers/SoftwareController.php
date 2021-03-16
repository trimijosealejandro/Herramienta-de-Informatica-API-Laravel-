<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Software;
use App\Pc;

class SoftwareController extends Controller
{
    //GET devuelve un listado de la tabla Softwares
    public function index(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar')){
                $Software=Software::Where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $Software=Software::all();
            }
            return $Software;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //POST Inserta un registro en la tabla Softwares
    public function store(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            $data = $request->all();
            $Software = new Software($data);
            $pc->Software()->save($Software);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la Software correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    // GET Muestra un registro de la tabla Softwares
    public function show(Departamento $departamento, Pc $pc, Software $Software)
    {
        if($departamento && $pc && $Software){
            return $Software;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Software no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla Softwares
    public function update(Request $request, Departamento $departamento, Pc $pc, Software $Software)
    {
        if($departamento && $pc && $Software){
            $data=$request->all();
            $Software->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la Software correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Software no existen'
            ],200);
        }
    }

    //DELETE Elimina una registro de la tabla Softwares
    public function destroy( Departamento $departamento, Pc $pc, $id)
    {
        if($departamento && $pc){
            Software::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la Software correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Software no existen'
            ],200);
        }
    }
}
