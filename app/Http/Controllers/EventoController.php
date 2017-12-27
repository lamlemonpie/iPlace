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
use iPlace\User;
use DateTime;

class EventoController extends Controller
{

    public function __construct()
    {
        $this->middleware('organizador', ['except' => ['index','show','misEventosAsistente','eventosCercanos','eventosCercanosAjax']]);
    }

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
        $categoria -> link_foto = "http://applemaniacos.com/noticias/wp-content/uploads/2015/03/Wallpaper-Mac-evento-9-marzo-no-logo.jpg";

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
        $evento->link_foto = $request['link_foto'];
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

        $asistentes = User::whereHas('eventos_usuario', function($q) use ($evento)
        {
            $q->where('id_evento', $evento->id);

        })->get();

        $ubicacion = Ubicacion::find($evento->id_ubicacion);
        $es_organizador= NULL;
        if(Auth::user()->organizador)
        {
          $es_organizador = Auth::user()->organizador->organizadores_evento
            ->where('id_evento',$evento->id)->first();
        }


        $usuario_evento = Auth::user()->eventos_usuario
              ->where('id_evento', $evento->id)->first();

        return view('eventos.ver',['evento'=>$evento, 'categorias'=>$categorias,
        'ubicacion'=>$ubicacion,'usuario_evento'=>$usuario_evento, 'es_organizador'=>$es_organizador, 'asistentes'=>$asistentes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
      $organizador = Auth::user()->organizador;
      $empresas = Empresa::whereHas('empresas_organizador', function($q) use ($organizador)
      {
          $q->where('id_organizador', $organizador->id);

      })->get();
      $categorias = Ambito::all();

        return view('eventos.editar',['evento'=>$evento,'empresas'=>$empresas, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $evento->update($request->all());

        return redirect('/eventos/'.$evento->id);
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
      $categoria -> link_foto = "/images/Speech.jpg";
      $categoria -> nombre = "Mis Eventos";

      return view('eventos.mostrar',['eventos'=>$eventos,'categoria'=>$categoria]);
    }


    public function misEventosAsistente()
    {

      $usuario = Auth::user();
      $eventos = Evento::with('eventos_ambito.ambito')->whereHas('eventos_usuario', function($q) use ($usuario)
      {
          $q->where('id_usuario', $usuario->id);

      })->get();

      $categoria = new \stdClass();
      $categoria -> link_foto = "/images/Speech.jpg";
      $categoria -> nombre = "Mis Eventos a Asistir";

      return view('eventos.mostrar',['eventos'=>$eventos,'categoria'=>$categoria]);
    }

    function distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
      // convert from degrees to radians
      $latFrom = deg2rad($latitudeFrom);
      $lonFrom = deg2rad($longitudeFrom);
      $latTo = deg2rad($latitudeTo);
      $lonTo = deg2rad($longitudeTo);

      $latDelta = $latTo - $latFrom;
      $lonDelta = $lonTo - $lonFrom;

      $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
      return $angle * $earthRadius;
    }

    public function eventosCercanos()
    {



      return view('mapas.eventos');
      //return view('mapas.prueba');


    }

    public function eventosCercanosAjax($lat, $long, $dist){
      $usuario = Auth::user();
      $eventos = Evento::all();
      $radio_busqueda = 1000 * $dist;
      $latitud = $lat;
      $longitud = $long;

      $eventosCercanos = [];

      foreach ($eventos as $evento) {
        $ubicacion = $evento->ubicacion;
        if($this->distance($latitud, $longitud, $ubicacion->latitud, $ubicacion->longitud) <= $radio_busqueda){
          array_push($eventosCercanos ,$evento);
        }
      }
      return response()->json($eventosCercanos);
    }


}
