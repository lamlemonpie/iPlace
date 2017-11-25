<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use iPlace\User;
use iPlace\User;
use iPlace\Evento;
use iPlace\Usuario_evento;

class UserController extends Controller
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
        //
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
    public function edit( User $user)
    {
        //
        return view('usuarios.edit',['user'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        $user -> $nombres = $request['nombres'];
        $user -> $apellidos = $request['apellidos'];
        $user -> $sexo = $request['sexo'];

        $user -> save();
        //modificar...
        return redirect('Inicio');

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

    public function prueba(){
      $user =new User();
      $user->nombres = 'Alexis';
      $user->apellidos = 'Mendoza';
      $user->password= 'pass';
      $user->email = 'texs.mv@gmail.com';
      $user->sexo = 'M';
      $user -> save();
      
      $b = new Usuario_evento();
      $b->usuario()->associate($user);
      $b->save();
      
      dd($user->eventos_usuario);
    }
}
