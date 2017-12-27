<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use iPlace\Evento;

use Illuminate\Support\Facades\Auth;
use DateTime;

use Culqi\Culqi;
use Culqi\CulqiException;

class PagoController extends Controller
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


    public function tarjeta(Request $request)
    {

      $token=$request['token'];
      $id_evento=$request['id_evento'];
      $evento=Evento::find($id_evento);

      if($token)
      {

        $SECRET_API_KEY = "ASa3QY0uw8LZ9eo9MM7zYzQRsZgQil7LR6UhI4/TdP8=";
        $culqi = new Culqi(array('api_key' => $SECRET_API_KEY));
        $culqi->setEnv("INTEG");


        try{
          $cargo = $culqi->Cargos->create(
              array(
                  "token"=> $token,
                  "moneda"=> "PEN",
                  "monto"=> $evento->precio*100,
                  "descripcion"=> 'Dale un aire de frescura a tu comunicación con un smartphone.',
                  "pedido"=> time(),
                  "codigo_pais"=> "PE",
                  "ciudad"=> "Lima",
                  "usuario"=> "71701956",
                  "direccion"=> "Avenida Lima 1232",
                  "telefono"=> 12313123,
                  "nombres"=> "Stephan",
                  "apellidos"=> "Vargas",
                  "correo_electronico"=> "stephan.vargas@culqi.com"
              )
          );
          return json_encode($cargo);
        }catch(Exception $e){
          return json_encode($e->getMessage());
        }

      }



    }


}
