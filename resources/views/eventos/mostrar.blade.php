@extends('layouts.app')
@section('title', 'Eventos')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">


	        	<legend class="text-center">

	        	<div class="container">
			    <br>    
				    <div class=" carousel carousel-inner slide" id="myCarousel" role="listbox" style=" width:100%; height: 200px !important;">
				    <!--<div id="myCarousel" class="carousel slide" date-ride="carousel">-->
				        <div class="carousel-inner" role="listbox">
				            <div class="item active">
				            @if($categoria->link_foto)
				            <img src="{{$categoria->link_foto}}">
				                <div class="carousel-caption">
				                    <p><font size="10"> {{$categoria->nombre}} </font></p>
				                </div>
				            </div>
				           	@else
				           	<img src="/images/Speech.jpg">
				                <div class="carousel-caption">
				                    <p><font size="10"> {{$categoria->nombre}} </font></p>
				                </div>
				            </div>
				           	@endif
				        </div>
				    </div>
				</div>

			    </legend>

	        	<div class="container">


              @foreach($eventos as $evento)
	        		<div class="col-sm-4 col-md-4">
		        		<div class="card">
			                <div class="card-image">
			                @if($evento->link_foto)
			                	<a href="{{asset('/eventos/'.$evento->id)}}" title=""><img src="{{$evento->link_foto}}" class="img-responsive"></a>
				           	@else
				           		<a href="{{asset('/eventos/'.$evento->id)}}" title=""><img src="/images/Library.jpg" class="img-responsive"></a>      
				           	@endif
				            
			            </div><!-- card image -->
			                <div class="card-content">
			                    <span class="card-title">{{$evento->nombre}}</span>
			                    <br><br>
							    <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> {{$evento->fecha_inicio}}</p>

                  @foreach($evento->eventos_ambito as $eventos_ambito)
                  <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  {{$eventos_ambito->ambito -> nombre}} </p>
                  @endforeach

                  @if( $evento->precio == 0)
                    <p class="card-text"><i class="glyphicon glyphicon-usd"></i> Gratuito </p>
                  @else
                    <p class="card-text"><i class="glyphicon glyphicon-usd"></i> {{$evento->precio}} </p>
                  @endif
							    <br>
							    <a href="{{asset('eventos')}}{{'/'.$evento->id}}" class="btn btn-primary">Ver Evento</a>
			                </div><!-- card content -->
			            </div>
			        </div>

			       	@endforeach

			     </div>

			     <br>


		</div>
	</div>
    <br>
</div>

<style type="text/css">

.card{
	background-color: #FFF;
    margin-top: 10px;
    position: relative;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    -moz-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  	box-shadow: 4 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}

.card .card-content {
    padding: 20px;
}

.card .card-content .card-title, .card-reveal .card-title{
    font-size: 24px;
    font-weight: 200;
}

.card .card-action{
    padding: 20px;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
}

.carousel-caption{
   position: absolute;
    top: 50%;
    transform: translateY(-90%);
}

</style>

@endsection
