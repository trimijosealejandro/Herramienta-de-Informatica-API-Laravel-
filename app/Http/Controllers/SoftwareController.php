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
    public function store(Request $request, Departamento $departamento, Pc $pcs)
    {
        if($departamento && $pcs){
            $data = $request->all();
            $Software = new Software($data);
            $pcs->Software()->save($Software);
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
    public function show(Departamento $departamento, Pc $pcs, Software $Software)
    {
        if($departamento && $pcs && $Software){
            return $Software;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la Software no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla Softwares
    public function update(Request $request, Departamento $departamento, Pc $pcs, Software $Software)
    {
        if($departamento && $pcs && $Software){
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
    public function destroy( Departamento $departamento, Pc $pcs, $id)
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
