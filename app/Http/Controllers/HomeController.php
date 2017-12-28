<?php

namespace iPlace\Http\Controllers;

use Illuminate\Http\Request;
use iPlace\Evento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::with('eventos_ambito.ambito')->where('link_foto','!=','NULL')->take(3)->get();
        return view('home',['eventos'=>$eventos]);
    }
}
