<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
   //GET Retorna una lista de la tabla departamentos pasndo el filtro por parametros
    public function index(Request $request)
    {
        if($request->has('txtBuscar')){
            $departamento=Departamento::where('name','like','%'.$request->txtBuscar.'%')
            ->get();
        }else{
            $departamento=Departamento::all();
        }
        return $departamento;
    }

    //POST adiciona un registro a la tabla departamentos
    public function store(Request $request)
    {
        $data=$request->all();
        Departamento::create($data);

        return response()->json([
            'res'=>true,
            'mesagge'=>'Departamento creado correctamente'
        ],200);
    }

    //GET Muestra un registro de la tabla departamento enviado por parametro
    public function show(Departamento $departamento)
    {
        return $departamento;
    }

    //PUT Actualiza un registro con los datos enviados por parametro
    public function update(Request $request, Departamento $departamento)
    {
        $data=$request->all();
        $departamento->update($data);
        return response()->json([
            'res'=>true,
            'mesagge'=>'Departamento actualizado correctamente'
        ],200);
    }

    //DELETE elimina un registro de la tabla departamento
    public function destroy($id)
    {
        Departamento::destroy($id);
        return response()->json([
            'res'=>true,
            'mesagge'=>'Departamento eliminado correctamente'
        ],200);
    }
}
