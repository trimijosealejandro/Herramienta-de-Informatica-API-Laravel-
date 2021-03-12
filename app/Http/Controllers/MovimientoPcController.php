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
    public function store(Request $request, Departamento $departamento, Pc $pcs)
    {
        if($departamento && $pcs){
            $data = $request->all();
            $MovimientoPc = new MovimientoPc($data);
            $pcs->MovimientoPc()->save($MovimientoPc);
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
    public function show(Departamento $departamento, Pc $pcs, MovimientoPc $MovimientoPc)
    {
        if($departamento && $pcs && $MovimientoPc){
            return $MovimientoPc;
        }else{
            return response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc o la MovimientoPc no existen'
            ],200);
        }
    }

    //PUT Actualiza un registro en la tabla MovimientoPcs
    public function update(Request $request, Departamento $departamento, Pc $pcs, MovimientoPc $MovimientoPc)
    {
        if($departamento && $pcs && $MovimientoPc){
            $data=$request->all();
            $MovimientoPc->update($data);
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
    public function destroy( Departamento $departamento, Pc $pcs, $id)
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
