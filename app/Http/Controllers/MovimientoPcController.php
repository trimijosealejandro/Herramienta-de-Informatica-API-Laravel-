<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\MovimientoPc;
use App\Pc;

class MovimientoPcController extends Controller
{
    //GET devuelve un listado de la tabla MovimientoPcs
    public function index(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar')){
                $MovimientoPc=MovimientoPc::Where('name','like','%'.$request->txtBuscar.'%')->get();
            }else{
                $MovimientoPc=MovimientoPc::all();
            }
            return $MovimientoPc;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //POST Inserta un registro en la tabla MovimientoPcs
    public function store(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            $data = $request->all();
            $MovimientoPc = new MovimientoPc($data);
            $pc->MovimientoPc()->save($MovimientoPc);
            return response()->json([
                'res'=>true,
                'message'=>'Creada la MovimientoPc correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    // GET Muestra un registro de la tabla MovimientoPcs
    public function show(Departamento $departamento, Pc $pc, MovimientoPc $movimientoPc)
    {
        if($departamento && $pc && $movimientoPc){
            return $movimientoPc;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la MovimientoPc no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla MovimientoPcs
    public function update(Request $request, Departamento $departamento, Pc $pc, MovimientoPc $movimientoPc)
    {
        if($departamento && $pc && $movimientoPc){
            $data=$request->all();
            $movimientoPc->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la MovimientoPc correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la MovimientoPc no existen'
            ],200);
        }
    }

    //DELETE Elimina una registro de la tabla MovimientoPcs
    public function destroy( Departamento $departamento, Pc $pc, $id)
    {
        if($departamento && $pc){
            MovimientoPc::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la MovimientoPc correctamente'
            ],200);
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la MovimientoPc no existen'
            ],200);
        }
    }
}
