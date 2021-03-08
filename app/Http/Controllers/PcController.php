<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Pc;


class PcController extends Controller
{
    //Listado de la tabla pc con filtro entrado por parametro
    public function index(Request $request, Departamento $departamento)
    {
        if($request->has('txtBuscar')){
            $pcs=Pc::where('name','like','%'.$request->txtBuscar.'%')
            ->get();
        }else{
            $pcs=Pc::all();
        }
        return $pcs;
    }

    //Adiciona una registro en la tabla pcs
    public function store( Request $request, Departamento $departamento)
    {
       $data=$request->all();

       $pc = new Pc([
        'name'=>$data['name']
       ]);

       $departamento->pc()->save($pc);

        return response()->json([
            'res'=>true,
            'message'=>'Creada la Pc correctamente'
        ],200);
    }

    //Devuelve un registro de la tabla pcs
    public function show(Departamento $departamento, Pc $pc)
    {
        return $pc;
    }

    //Actualiza un registro de la tabla pcs
    public function update(Request $request, Departamento $departamento, Pc $pc)
    {
        $data=$request->all();

        $pc->update($data);

        return response()->json([
            'res'=>true,
            'message'=>'Actualizada la Pc correctamente'
        ],200);
    }

    //Elimina una registro de la tabla pcs
    public function destroy(Departamento $departamento, $id)
    {
        Pc::destroy($id);

        return response()->json([
            'res'=>true,
            'message'=>'Elimino la Pc correctamente'
        ],200);
    }
}
