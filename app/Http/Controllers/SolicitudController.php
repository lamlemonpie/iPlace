<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use iPlace\Organizador;
use iPlace\Solicitud;
use iPlace\Empresa;
use iPlace\Empresa_organizador;

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

      $usuario = Auth::user();

      $empresa = Empresa::find($request['id_empresa']);
      $org_propietario = $empresa -> admin;
      $admin = $org_propietario -> usuario;


      if(Solicitud::where('id_usuario_solicitante',$usuario->id) -> exists())
      {

        return view('solicituds.enviado',['admin'=>$admin]);
      }
      else {
        $solicitud = new Solicitud();
        $solicitud -> usuario_Solicitante() -> associate($usuario);
        $solicitud -> organizador_Propietario() -> associate($org_propietario);
        $solicitud -> empresa() -> associate($empresa);
        $solicitud -> save();
      }





      return view('solicituds.enviado',['admin'=>$admin]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //

        $usuario = $solicitud -> usuario_Solicitante;
        $organizador = $solicitud -> organizador_Propietario-> usuario;
        $empresa = $solicitud -> empresa;

        return view('solicituds.show',['solicitud'=>$solicitud,'usuario'=>$usuario,'organizador'=>$organizador, 'empresa'=>$empresa]);
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


    public function indexEnviado()
    {

      $solicitudes = Auth::user()->solicitudes_enviadas;


      return view('solicituds.indexEnviado',['solicitudes'=>$solicitudes]);

    }

    public function aceptarSolicitud(Solicitud $solicitud)
    {


      $usuario = $solicitud -> usuario_Solicitante;
      $organizador = Organizador::where('id_usuario',$usuario->id)->first();


      if( !$organizador  )
      {

        $organizador = new Organizador();
        $organizador -> usuario() -> associate($usuario);
        $organizador -> save();

      }

      $eo = new Empresa_organizador();
      $eo -> empresa()->associate($solicitud->empresa);
      $eo -> organizador()->associate($organizador);
      $eo -> save();

      $solicitud->delete();

      return redirect('/home');

    }


}
