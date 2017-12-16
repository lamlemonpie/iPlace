<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use iPlace\Evento;
use iPlace\Organizador;
use iPlace\Organizador_evento;
use iPlace\Empresa;
use iPlace\Empresa_organizador;
use iPlace\Ambito;
use iPlace\Evento_ambito;
use iPlace\Ubicacion;
use DateTime;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eventos = Evento::with('eventos_ambito.ambito')->get();

        $categoria = new \stdClass();
        $categoria -> nombre = "Todos los Eventos";

        return view('eventos.mostrar',['eventos'=>$eventos,'categoria'=>$categoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizador = Auth::user()->organizador;
        $empresas = Empresa::whereHas('empresas_organizador', function($q) use ($organizador)
        {
            $q->where('id_organizador', $organizador->id);

        })->get();
        $categorias = Ambito::all();
        return view('eventos.create',['empresas'=>$empresas, 'categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*request()->validate([
          'nombre' => 'required|string|min:4|max:50',
          'descripcion' => 'required|string|min:4'
        ]);*/
        $ubicacion = Ubicacion::where([
            ['latitud', $request['latitud']],
            ['longitud', $request['longitud']]
            ]) -> first();
        if (!$ubicacion)
        {
            $ubicacion = new Ubicacion();
            $ubicacion->latitud = $request['latitud'];
            $ubicacion->longitud = $request['longitud'];
            $ubicacion->save();
        }

        $evento = new Evento();
        $evento->nombre = $request['eventName'];
        $evento->id_ubicacion = $ubicacion->id;
        $evento->ciudad = $request['ciudad'];
        $evento->direccion = $request['direccion'];
        $evento->referencia = $request['referencia'];
        $evento->link_youtube = $request['link_video'];
        $evento->descripcion = $request['descripcion'];
        $evento->info_adicional = $request['adicional'];
        if($request['precio']== NULL)
        {
          $evento->precio = 0;
        }
        else {
          $evento->precio = $request['precio'];
        }

        $evento->fecha_inicio = $request['fecha_inicio'];
        $evento->fecha_fin = $request['fecha_fin'];
        $evento->fecha_creacion = new DateTime();
        $evento->save();

        $organizador = Auth::user()->organizador;

        $empresa = Empresa::find($request['id_empresa']);

        $organizador_evento = new Organizador_evento();
        $organizador_evento->organizador()->associate($organizador);
        $organizador_evento->evento()->associate($evento);
        $organizador_evento->empresa()->associate($empresa);
        $organizador_evento->fecha_ingreso = new DateTime();
        $organizador_evento->save();

        $ambito = Ambito::find($request['id_categoria']);

        $evento_ambito = new Evento_ambito();
        $evento_ambito->evento()->associate($evento);
        $evento_ambito->ambito()->associate($ambito);
        $evento_ambito->fecha_agrego = new DateTime();
        $evento_ambito->save();

        return redirect('/eventos/'.$evento->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        $categorias = Ambito::whereHas('eventos_ambito', function($q) use ($evento)
        {
            $q->where('id_evento', $evento->id);

        })->get();
        $ubicacion = Ubicacion::find($evento->id_ubicacion);
        return view('eventos.ver',['evento'=>$evento, 'categorias'=>$categorias, 'ubicacion'=>$ubicacion]);
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

    public function misEventos()
    {
      $organizador = Auth::user()->organizador;

      $eventos = Evento::with('eventos_ambito.ambito')->whereHas('organizadores_evento', function($q) use ($organizador)
      {
          $q->where('id_organizador', $organizador->id);

      })->get();

      $categoria = new \stdClass();
      $categoria -> nombre = "Mis Eventos";

      return view('eventos.mostrar',['eventos'=>$eventos,'categoria'=>$categoria]);
    }

}
