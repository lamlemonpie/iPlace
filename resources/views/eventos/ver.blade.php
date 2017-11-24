@extends('layouts.app')

@section('content')

<div class="container">
<br><br><br>

    <form class="form-horizontal" role="form" method="POST" action="">
    <input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <div class="col-xs-7 col-md-7">
                    <div class="card">
                        <div class="container">
                            <h2><b> Nombre</b></h2>
                        </div>
                        <div class="card-image">
                            <a href="{{asset('#')}}" title=""><img src="../images/Fondo1.jpg" class="img-responsive"></a>
                        </div><!-- card image -->
                        <div class="card-content">
                            <span class="card-title">Descripción del evento</span>
                            <p>Lalalal Lalalal Lalalal LalalalLalalalLalalal</p>
                            <br>
                        </div><!-- card content -->
                    </div>
                </div>
                <div class="col-xs-5 col-md-5">
                    <div class="card">
                        <div class="container"></div>
                        <div class="card-content">
                            <a href="https://www.facebook.com/bootsnipp"><i id="social-fb1" class="fa fa-facebook-square fa-3x social"></i></a>
                            <a href="https://twitter.com/bootsnipp"><i id="social-tw1" class="fa fa-twitter-square fa-3x social"></i></a>
                            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp1" class="fa fa-google-plus-square fa-3x social"></i></a>
                            <a href="mailto:bootsnipp@gmail.com"><i id="social-em1" class="fa fa-envelope-square fa-3x social"></i></a>
                            <font size="5">&ensp; Redes Sociales</font>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <p class="card-text"><i class="glyphicon glyphicon-calendar"></i> Some example text.</p>
                            <p class="card-text"><i class="glyphicon glyphicon-time"></i> Some example text.</p>
                            <p class="card-text"><i class="glyphicon glyphicon-tags"></i>  Some example text.</p>
                        </div><!-- card content -->
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Ubicación</span><br><br>
                            <p class="card-text"><i class="glyphicon glyphicon-plane"></i> AREQUIPA</p>
                            <p class="card-text"><i class="glyphicon glyphicon-map-marker"></i> Dirección</p>
                            <p class="card-text"><i> Referencias</i></p>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.5871874198974!2d-71.52405075505996!3d-16.394978299924194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424bacd71a2591%3A0x568581cab2a28f07!2sPiscina+Municipal+Miraflores!5e0!3m2!1ses-419!2spe!4v1511473482381"></iframe>
                            </div>
                        </div><!-- card content -->
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Video</span><br><br>
                                <div class="embed-responsive embed-responsive-16by9" >
                                <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/jVIxe3YLNs8"></iframe>
                                </div>
                        </div><!-- card content -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    </form>
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

.card .card-image{
    overflow: hidden;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
}

.card .card-image img{
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.card .card-image:hover img{
    -webkit-transform: scale(1.2) rotate(-7deg);
    -moz-transform: scale(1.2) rotate(-7deg);
    -ms-transform: scale(1.2) rotate(-7deg);
    -o-transform: scale(1.2) rotate(-7deg);
    transform: scale(1.2) rotate(-7deg);
}

 #social-fb1 {
     color: #000;
 }
 #social-tw1 {
     color: #000;
 }
 #social-gp1 {
     color: #000;
 }
 #social-em1 {
     color: #000;
 }
 #social-fb1:hover {
     color: #3B5998;
 }
 #social-tw1:hover {
     color: #4099FF;
 }
 #social-gp1:hover {
     color: #d34836;
 }
 #social-em1:hover {
     color: #f39c12;
 }

</style>

@endsection
