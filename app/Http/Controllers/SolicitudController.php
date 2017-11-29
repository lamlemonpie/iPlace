<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use iPlace\Organizador;
use iPlace \Solicitud;
use iPlace\Empresa;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $solicitudes = Auth::user()->organizador->solicitudes_recibidas;


        return view('solicituds.index',['solicitudes'=>$solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Corregir con asociacion de usuario a organizador.

      $organizador = Auth::user()->organizador;
      $org_propietario = Empresa::find($request['id_empresa']) -> admin;
      $admin = $org_propietario -> usuario;

      if($organizador)
      {
        $solic = Solicitud::where('id_organizador_solicitante',$organizador->id);
        if($solic)
        {
          return view('solicituds.enviado',['admin'=>$admin]);
        }


      }
      else
      {
        $organizador = new Organizador();
        $organizador->usuario()->associate(Auth::user());
        $organizador->save();
      }

      $solicitud = new Solicitud();
      $solicitud -> organizador_Solicitante() -> associate($organizador);
      $solicitud -> organizador_Propietario() -> associate($org_propietario);
      $solicitud -> save();



      return view('solicituds.enviado',['admin'=>$admin]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
