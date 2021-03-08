<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Inspeccion;
use App\Pc;

class InspeccionController extends Controller
{
    //Listado de la tabla inspecciones con filtro entrado por parametro
    public function index( Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            if($request->has('txtBuscar'))
            {
                $inspeccion=Inspeccion::Where('name','like','%'.$request->txtBuscar.'%')
                ->get();
            }else
            {
                $inspeccion=Inspeccion::all();
            }
            return $inspeccion;
        }else
        {
            response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //Adiciona un registro en la tabla inspecciones
    public function store(Request $request, Departamento $departamento, Pc $pc)
    {
        if($departamento && $pc){
            $data=$request->all();

            $inspeccion = new Inspeccion([
             'name'=>$data['name']
            ]);

            $pc->inspeccion()->save($inspeccion);

             return response()->json([
                 'res'=>true,
                 'message'=>'Creada la inspeccion correctamente'
             ],200);
        }else
        {
            response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }

    }

    //Devuelve un registro de la tabla inspeccion
    public function show(Departamento $departamento, Pc $pc, Inspeccion $inspeccion)
    {
        if($departamento && $pc){
            return $inspeccion;
        }else
        {
            response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //Actualiza un registro de la tabla inspeccion
    public function update(Request $request, Departamento $departamento, Pc $pc, Inspeccion $inspeccion)
    {
        if($departamento && $pc){
            $data=$request->all();
            $inspeccion->update($data);
            return response()->json([
                'res'=>true,
                'message'=>'Actualizada la inspeccion correctamente'
            ],200);
        }else
        {
            response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }

    //Elimina un registro de la tabla inspeccion
    public function destroy(Departamento $departamento, Pc $pc, $id)
    {
        if($departamento && $pc){
            Inspeccion::destroy($id);
            return response()->json([
                'res'=>true,
                'message'=>'Eliminada la inspeccion correctamente'
            ],200);
        }else
        {
            response()->json([
                'res'=>false,
                'message'=>'El departamento o la pc no existen'
            ],200);
        }
    }
}
