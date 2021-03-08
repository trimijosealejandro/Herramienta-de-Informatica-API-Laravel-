<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    //GET muestra la lista de la tabla Departaemntos pasando por parametro la condicion de busqueda"txtBuscar"

    public function index(Request $request)
    {
        if($request->has('txtBuscar')){
            $departamento=Departamento::where('name','like','%'.$request->txtBuscar.'%')->get();
        }else{
            $departamento=Departamento::all();
        }
        return $departamento;
    }

    //POST insertar un registro de la tabla departamentos
    public function store(Request $request)
    {
        $data=$request->all();

        Departamento::create($data);

        return response()->json([
            'res'=>true,
            'message'=>'Creado el departamento correctamente'
        ], 200);
    }

    //GET muestra el registro enviado por parametros de la tabla departamentos
    public function show(Departamento $departamento)
    {
        return $departamento;

    }
    //PUT actualiza el registro enviado por parametro en la tabla departamentos
    public function update(Request $request, Departamento $departamento)
    {
        $data=$request->all();
        $departamento->update($data);

        return response()->json([
            'res'=>true,
            'message'=>'Actualizado el departamento correctamente'
        ], 200);
    }

    //DELETE Eliminar el registro enviado por parametro en la tabla departamento
    public function destroy(Departamento $departamento)
    {
        Departamento::destroy($departamento->id);
        return response()->json([
            'res'=>true,
            'message'=>'Eliminado el departamento correctamente'
        ], 200);
    }
}
