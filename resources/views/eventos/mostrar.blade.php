@extends('layouts.app')
@section('title', 'Eventos')

@section('content')

<div class="container">
  <br><br> <br>

  	<div class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
	        <form class="form-horizontal" role="form" method="POST" action="">
	        <input name="_method" type="hidden" value="PATCH">
	                {{ csrf_field() }}

	        	<legend class="text-center"><b>Eventos</b></legend>

	        	<div class="container">
	        		<div class="col-sm-4 col-md-4">
		        		<div class="card">
			                <div class="card-image">
			                    <a href="{{asset('/eventos/ver')}}" title=""><img src="http://lorempixel.com/555/300/sports" class="img-responsive"></a>
			                </div><!-- card image -->
			                <div class="card-content">
			                    <span class="card-title">Material Cards</span>
			                    <br><br>
							    <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Some example text.</p>
							    <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  Some example text.</p>
							    <br>
							    <a href="#" class="btn btn-primary">See Profile</a>
			                </div><!-- card content -->
			            </div>
			        </div>

			       	<div class="col-sm-4 col-md-4">
		        		<div class="card">
			                <div class="card-image">
			                    <a href="{{asset('#')}}" title=""><img src="http://lorempixel.com/555/300/sports" class="img-responsive"></a>
			                </div><!-- card image -->
			                <div class="card-content">
			                    <span class="card-title">Material Cards</span>
			                    <br><br>
							    <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Some example text.</p>
							    <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  Some example text.</p>
							    <br>
							    <a href="#" class="btn btn-primary">See Profile</a>
			                </div><!-- card content -->
			            </div>
			        </div>

					<div class="col-sm-4 col-md-4">
		        		<div class="card">
			                <div class="card-image">
			                    <a href="{{asset('#')}}" title=""><img src="http://lorempixel.com/555/300/sports" class="img-responsive"></a>
			                </div><!-- card image -->
			                <div class="card-content">
			                    <span class="card-title">Material Cards</span>
			                    <br><br>
							    <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Some example text.</p>
							    <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  Some example text.</p>
							    <br>
							    <a href="#" class="btn btn-primary">See Profile</a>
			                </div><!-- card content -->
			            </div>
			        </div>
			     </div>

			     <br>

			     <div class="container">
	        		<div class="col-sm-4 col-md-4">
		        		<div class="card">
			                <div class="card-image">
			                    <a href="{{asset('#')}}" title=""><img src="http://lorempixel.com/555/300/sports" class="img-responsive"></a>
			                </div><!-- card image -->
			                <div class="card-content">
			                    <span class="card-title">Material Cards</span>
			                    <br><br>
							    <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Some example text.</p>
							    <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  Some example text.</p>
							    <br>
							    <a href="#" class="btn btn-primary">See Profile</a>
			                </div><!-- card content -->
			            </div>
			        </div>

			       	<div class="col-sm-4 col-md-4">
		        		<div class="card">
			                <div class="card-image">
			                    <a href="{{asset('#')}}" title=""><img src="http://lorempixel.com/555/300/sports" class="img-responsive"></a>
			                </div><!-- card image -->
			                <div class="card-content">
			                    <span class="card-title">Material Cards</span>
			                    <br><br>
							    <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Some example text.</p>
							    <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  Some example text.</p>
							    <br>
							    <a href="#" class="btn btn-primary">See Profile</a>
			                </div><!-- card content -->
			            </div>
			        </div>

					<div class="col-sm-4 col-md-4">
		        		<div class="card">
			                <div class="card-image">
			                    <a href="{{asset('#')}}" title=""><img src="http://lorempixel.com/555/300/sports" class="img-responsive"></a>
			                </div><!-- card image -->
			                <div class="card-content">
			                    <span class="card-title">Material Cards</span>
			                    <br><br>
							    <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Some example text.</p>
							    <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  Some example text.</p>
							    <br>
							    <a href="#" class="btn btn-primary">See Profile</a>
			                </div><!-- card content -->
			            </div>
			        </div>
			     </div>
			</form>
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

</style>

@endsection