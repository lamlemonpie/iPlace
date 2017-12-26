<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use iPlace\Ambito;
use DateTime;

class AmbitoController extends Controller
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
        $categorias = Ambito::all();
        return view('ambitos.index',['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ambitos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Ambito();
        $categoria->nombre = $request['nombre'];
        $categoria->descripcion = $request['descripcion'];
        $categoria -> link_foto = $request['link_foto'];
        $categoria->fecha_creacion = new DateTime();
        $categoria->fecha_modificacion = new DateTime();
        $categoria->save();

        return redirect('/ambitos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ambito $ambito)
    {
        return view('ambitos.show',['categoria'=>$ambito]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambito $ambito)
    {
        return view('ambitos.edit',['categoria'=>$ambito]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Ambito $ambito)
    {
        $ambito -> nombre = $request['nombre'];
        $ambito -> descripcion = $request['descripcion'];
        $ambito -> link_foto = $request['link_foto'];
        $ambito->fecha_modificacion = new DateTime();
        $ambito -> save();

        return redirect('/ambitos/'.$ambito->id);
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
