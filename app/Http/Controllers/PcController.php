<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Pc;

class PcController extends Controller
{
    //GET Devuelve una lista de la tabal pcs filtrada por parametro
    public function index(Request $request, Departamento $departamento)
    {
        if($request->has('txtBuscar')){
            $pcs=Pc::Where('name','like','%'.$request->txtBuscar.'%')
            ->Where('departamentos_id','like',$departamento->id)
            ->get();
        }else{
            $pcs=Pc::Where('departamentos_id','like',$departamento->id)->get();
        }
        return $pcs;
    }

    //POST Inserta un registro en la tabla pcs enviado por paramtros
    public function store(Request $request, Departamento $departamento)
    {
        if($departamento){
            $data = $request->all();
            $pc = new Pc($data);
            $departamento->pc()->save($pc);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la Pc correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento no existe'
            ],200);
        }


    }

    //GET muestra un registro de la tabla pcs
    public function show(Departamento $departamento, Pc $pc)
    {

        if($departamento){
            return $pc;

        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento no existe'
            ],200);
        }
    }

    //PUT Actualiza un registro de la tabla pcs
    public function update(Request $request,Departamento $departamento, Pc $pc)
    {
        if($departamento){
            $data=$request->all();
            $pc->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la Pc correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento no existe'
            ],200);
        }
    }

   //DELETE Elimina un registro de la tabla pcs
    public function destroy( Departamento $departamento, $id)
    {
        if($departamento){
            Pc::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la Pc correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento no existe'
            ],200);
        }
    }
}
