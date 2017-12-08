<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iPlace') }}</title>

    <!-- Styles -->

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    <!-- JS --> <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>


    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"></link>
    -->





</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top first-navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">iPlace</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}"><img src="{{asset('images/logotipo2.png')}}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        <li>
                        <div class="col-sm-12 col-md-12">
                            <form class="navbar-form" role="search">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>

                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ asset('organizadors/create') }}">Convertirme en organizador</a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> Solicitudes <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ ('/solicituds/create') }}"><i class="glyphicon glyphicon-check"></i> Enviar solicitud a empresa </a></li>
                                    <li><a href="{{ ('/solicituds') }}"><i class="glyphicon glyphicon-list"></i> Ver mis solicitudes Recibidas </a></li>
                                    <li><a href="{{ ('/solicituds/enviado') }}"><i class="glyphicon glyphicon-list"></i> Ver mis solicitudes Enviadas </a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> Eventos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ ('/eventos/create') }}"><i class="glyphicon glyphicon-check"></i> Crear evento </a></li>
                                    <li><a href="{{ ('#') }}"><i class="glyphicon glyphicon-list"></i> Ver mis eventos </a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> Usuarios <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ ('/users') }}"><i class="glyphicon glyphicon-check"></i> Ver Usuarios </a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> Empresas <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ ('/empresas/create') }}"><i class="glyphicon glyphicon-check"></i> Crear empresa </a></li>
                                    <li><a href="{{ ('/empresas') }}"><i class="glyphicon glyphicon-list"></i> Ver mis empresas </a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> Categorías <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ ('/ambitos/create') }}"><i class="glyphicon glyphicon-check"></i> Crear categoría </a></li>
                                    <li><a href="{{ ('/ambitos') }}"><i class="glyphicon glyphicon-list"></i> Ver categorías </a></li>
                                </ul>
                            </li>


                            <li class="active" class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle-o"></i> {{ Auth::user()->nombres }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{asset('users/'.Auth::user()->id)}}"><i class="glyphicon glyphicon-user"></i> Ver perfil</a></li>
                                    <li><a href="{{asset('users/'.Auth::user()->id.'/edit')}}"><i class="glyphicon glyphicon-pencil"></i> Editar perfil</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @auth
        <nav class="navbar navbar-inverse navbar-static-top second-navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse2">
                        <span class="sr-only">iPlace</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse2">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ ('#') }}"> Tecnología </a></li>
                        <li><a href="{{ ('#') }}"> Biología </a></li>
                        <li><a href="{{ ('#') }}"> Medicina </a></li>
                        <li><a href="{{ ('#') }}"> Ingeniería </a></li>
                    </ul>
                </div>
                @endauth
            </div>
        </nav>

        @yield('content')

        <div id="footer">
            <div class="container">
            <br>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                    <a class="navbar-brand" href="{{ url('/home') }}"><img src="{{asset('images/logotipo2.png')}}">
                    </a>
                    </div>
                </div>
                <div class="row">
                      <div class="col-md-4">
                          <br>
                            <p><a class="footertext" href="{{ ('#') }}">¿Cómo funciona?</a></p>
                            <p><a class="footertext" href="{{ ('#') }}">Preguntas frecuentes</a></p>
                            <p><a class="footertext" href="{{ ('#') }}">Acerca de nosotros</a></p>
                          <br>
                      </div>
                      <div class="col-md-4">
                        <br>
                            <p><a class="footertext" href="{{ ('#') }}">Explora iPlace</a></p>
                            <p><a class="footertext" href="{{ ('#') }}">Danos tu opinion</a></p>
                            <p><a class="footertext" href="{{ ('#') }}">Blog</a></p>
                            <p><a class="footertext" href="{{ ('#') }}">Libro de Reclamaciones</a></p>
                          <br>
                      </div>
                      <div class="col-md-4">
                      <br>
                            <a href="https://www.facebook.com"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                            <a href="https://twitter.com"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                            <a href="https://plus.google.com"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                            <a href="https://mail.google.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                      </div>
                </div>
                <div class="row">
                    <p><center><a href="#">CS UNSA</a> <p class="footertext">Copyright 2017</p></center></p>
                </div>
            </div>
        </div>
    </div>



</body>
</html>

<style type="text/css">
    body {
      padding-top: 26px;
      background-color: #E6E6E6;
      height: 100%;
      min-height : 100%;
    }
    .second-navbar{
      float: none;
      top: 50px;
      background-color: #424142;
    }
    .first-navbar{
        margin-bottom: 0;
        background-color: #000000;
        color : #FFF;
        padding: 1% 0;
        font-size: 1.3em;
        border: 0;
    }
    .navbar .nav > li > a {
        color:  #FFF;
    }
    .navbar-inverse .navbar-nav {
        display:inline-block;
        float:none;
    }
    .navbar-inverse .navbar-nav > .active > a,
    .navbar-inverse .navbar-nav > .active > a:hover,
    .navbar-inverse .navbar-nav > .active > a:focus{
        color: #FFFFFF;
        background-color: #49AC8E;
        text-shadow: none;
    }
    .navbar-inverse .navbar-nav > li > a:hover,
    .navbar-inverse .navbar-nav > li > a:focus{
        color:#0C8053;
        background-color: #FFFFFF;
    }

    .navbar-inverse .navbar-nav > .open > a,
    .navbar-inverse .navbar-nav > .open > a:hover,
    .navbar-inverse .navbar-nav > .open > a:focus{
        color:#0C8053;
        background-color: #D8D8D8;
    }

    .navbar-brand{
        float: left;
        min-height: 40px;
        padding: 0 25px 0px;
    }
    #footer {
      position: relative;
      clear: both;
      /* Set the fixed height of the footer here */
      height: 280;
      margin-top: -280;
      background:
      /* color overlay */
        linear-gradient(
          rgba(20, 20, 20, 0.9),
          rgba(20, 20, 20, 0.9)
        ),
        /* image to overlay */
        /*url(http://images.cdn.fotopedia.com/_avPIZmqM3w-7z161LH_268-hd.jpg);*/
        url(https://mir-s3-cdn-cf.behance.net/project_modules/disp/a7fbff15899853.562b53338a6e9.png);
    }
    .footertext {
      color: #ffffff;
    }

    a{
        color: #FFFFFF;
        text-decoration: none;
    }
    a:hover, a:focus
    {
        color:#FFFFFF;
        text-decoration:none;
        cursor:pointer;
    }
    #social-fb:hover {
     color: #3B5998;
    }
    #social-tw:hover {
     color: #4099FF;
    }
    #social-gp:hover {
     color: #d34836;
    }
    #social-em:hover {
     color: #f39c12;
    }
    #map {
      height: 500px;
      width: 100%;
     }
   #floating-panel {
      position: absolute;
      top: 35px;
      left: 25%;
      z-index: 5;
      background-color: #fff;
      padding: 5px;
      border: 1px solid #999;
      text-align: center;
      font-family: 'Roboto','sans-serif';
      line-height: 30px;
      padding-left: 10px;
    }


</style>
