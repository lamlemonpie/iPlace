<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use iPlace\User;
use iPlace\Organizador;
use iPlace\Empresa;
use Illuminate\Support\Facades\Auth;
use DateTime;

class EmpresaController extends Controller
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

        return redirect('/home');
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

    public function crearNuevaEmpresaAjx()
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

        return redirect('/home');
    }
}
