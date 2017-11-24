@extends('layouts.app')

@section('content')

    <br>
    <div id="myCarousel" class="carousel slide" date-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="../images/Fondo1.jpg">
                <div class="carousel-caption">
                    <p><font size="12"> ¡Bienvenidos! </font></p>
                    <a href="{{ asset('eventos/mostrar') }}" role="button" class="btn btn-default btn-lg"> Ver eventos </a>
                </div>
            </div>
            <div class="item">
                <img src="../images/Library.jpg">
            </div>
            <div class="item">
                <img src="../images/Speech.jpg">
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenidos
                </div>
            </div>
        </div>
    </div>

<style type="text/css">
    .carousel-caption{
        top=50%;
        transform: translateY(-150%);
        text-transform: uppercase;
    }
    
</style>

@endsection
