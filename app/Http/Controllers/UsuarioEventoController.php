<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use iPlace\Evento;
use iPlace\Usuario_evento;
use Illuminate\Support\Facades\Auth;
use DateTime;

class UsuarioEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Evento $evento)
    {
        return view('eventos.asistir',['evento'=>$evento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel(Evento $evento)
    {
        return view('eventos.cancelar',['evento'=>$evento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Evento $evento,Request $request)
    {


        if(Usuario_evento::where('id_usuario',Auth::user()->id)->exists())
        {
          return redirect('/eventos/'.$evento->id);
        }
        else {
          $ue = new Usuario_evento;
          $ue -> id_usuario = Auth::user()->id;
          $ue -> id_evento = $evento -> id;
          $ue -> fecha_registro = new DateTime;

          $ue -> save();

        }



        return redirect('/eventos/'.$evento->id);
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
    public function destroy(Evento $evento)
    {

      $ue = Auth::user()->eventos_usuario
          ->where('id_evento',$evento->id)->first();
      $ue -> delete();

      return redirect('/eventos/'.$evento->id);


    }
}
