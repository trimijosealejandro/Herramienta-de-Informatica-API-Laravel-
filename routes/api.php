<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login','UserController@login');
Route::post('register','UserController@register');

 Route::group(['middleware'=>'auth:api'], function(){
    Route::apiResource('departamento','DepartamentoController');
    Route::apiResource('departamento.pc','PcController');
    Route::apiResource('departamento.pc.inspeccion','InspeccionController');
    Route::apiResource('departamento.pc.soporte','SoporteController');
    Route::apiResource('departamento.pc.software','SoftwareController');
    Route::apiResource('departamento.pc.mantenimiento','MantenimientoController');
    Route::apiResource('departamento.pc.incidencia','IncidenciaController');
    Route::apiResource('departamento.pc.seguridad','SeguridadController');
    Route::apiResource('departamento.pc.movimientoPc','MovimientoPcController');
    Route::get('logout','UserController@logout');
});


