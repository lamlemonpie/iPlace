<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use iPlace\User;
use iPlace\Organizador;
use iPlace\Empresa;
use iPlace\Empresa_organizador;

use Illuminate\Support\Facades\Auth;
use DateTime;

class EmpresaController extends Controller
{

    public function __construct()
    {
        $this->middleware('organizador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $organizador = Organizador::where('id_usuario', Auth::user()->id)
                                  ->get()
                                  ->first();

        $empresas = Empresa::where('id_admin',$organizador->id)
                        ->get();


        return view('empresa.index',['empresas'=>$empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('empresa.crear',['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $organizador = Organizador::where('id_usuario', Auth::user()->id)
                                          ->get()
                                          ->first();
      request()->validate([
          'nombre' => 'required|string|min:4|max:50',
          'descripcion' => 'required|string|min:4'
      ]);
      $empresa = new Empresa();
      $empresa->nombre = $request['nombre'];
      $empresa->descripcion = $request['descripcion'];
      $empresa->fecha_creacion = new DateTime();
      $empresa->admin()->associate($organizador);
      $empresa->save();

      $s = new Empresa_organizador;
      $s -> empresa() -> associate($empresa);
      $s -> organizador() -> associate($organizador);
      $s -> save();


      return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
        $nombres = $empresa -> admin -> usuario -> nombres;
        $apellidos = $empresa -> admin -> usuario -> apellidos;

        $organizadores = Empresa_organizador::with('organizador.usuario')->where('id_empresa',$empresa->id)
                        ->where('id_organizador','!=',$empresa->admin->id)
                        ->get();

        return view('empresa.ver',['empresa'=>$empresa, 'nombres'=>$nombres, 'apellidos'=>$apellidos,'organizadores'=>$organizadores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
        $nombres = $empresa -> admin -> usuario -> nombres;
        $apellidos = $empresa -> admin -> usuario -> apellidos;

        $organizadores = Empresa_organizador::with('organizador.usuario')->where('id_empresa',$empresa->id)
                        ->where('id_organizador','!=',$empresa->admin->id)
                        ->get();

        return view('empresa.editar',['empresa'=>$empresa, 'nombres'=>$nombres, 'apellidos'=>$apellidos,'organizadores'=>$organizadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
        //$empresa ->update($request->all());

        $empresa -> nombre = $request['nombre'];
        $empresa -> descripcion = $request['descripcion'];
        $empresa -> save();

        return redirect('/empresas/'.$empresa->id);

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

    public function createAjx()
    {
        return response()->json(view('empresa.crearAjx')->render());
    }

    public function storeAjx(Request $request)
    {
        $organizador = new Organizador();
        $organizador->usuario()->associate(Auth::user());
        $organizador->save();



        request()->validate([
            'nombre' => 'required|string|min:4|max:50',
            'descripcion' => 'required|string|min:4'
        ]);
        $empresa = new Empresa();
        $empresa->nombre = $request['nombre'];
        $empresa->descripcion = $request['descripcion'];
        $empresa->fecha_creacion = new DateTime();
        $empresa->admin()->associate($organizador);
        $empresa->save();

        $s = new Empresa_organizador;
        $s -> empresa() -> associate($empresa);
        $s -> organizador() -> associate($organizador);
        $s -> save();

        return redirect('/home');
    }

    public function expellOrganizador($empresa,$organizador)
    {
        $empresa = Empresa::find($empresa);
        $organizador = Organizador::find($organizador);
        $e_o = $organizador->empresas_organizador()->where('id_empresa',$empresa->id)->get()->first();
        $e_o -> delete();
        $solicitud = $organizador->usuario->solicitudes_enviadas()->where('id_empresa',$empresa->id)->get()->first();
        $solicitud -> delete();
        if (!$organizador->empresas_organizador() -> exists())
        {
            $organizador -> delete();
        }
        //return 'success';
        return response()->json(true);

    }

    public function todosOrganizadores(Empresa $empresa)
    {
      $organizadores = Empresa_organizador::with('organizador.usuario')->where('id_empresa',$empresa->id)
                      ->where('id_organizador','!=',$empresa->admin->id)
                      ->get();
      return view('empresa.organizadores',['empresa'=>$empresa,'organizadores'=>$organizadores]);
    }

}
