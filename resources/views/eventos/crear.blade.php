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
                <legend class="text-center"><b>Detalles del Evento</b></legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Nombre del evento</label>
                        <input class="form-control" name="eventName" placeholder="Nombre del evento" type="text" /><br>
                    <label for="">Elije una categoria</label>
                        <select class="form-control" name="categoria">
                            <option value="Categoria">Categoría</option>
                        </select><br>
                    <label for="">Descripción del evento</label>
                        <textarea name="message" id="message" class="form-control" rows="4" cols="14" required="required" placeholder="Escriba aquí la descripción del evento"></textarea><br>
                    <label>Fecha de inicio</label><br>
                        <select name="dateStart[day]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24" selected="selected">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select> 
                        de
                        <select name="dateStart[month]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="01">enero</option>
                            <option value="02">febrero</option>
                            <option value="03">marzo</option>
                            <option value="04">abril</option>
                            <option value="05">mayo</option>
                            <option value="06">junio</option>
                            <option value="07">julio</option>
                            <option value="08">agosto</option>
                            <option value="09">septiembre</option>
                            <option value="10">octubre</option>
                            <option value="11" selected="selected">noviembre</option>
                            <option value="12">diciembre</option>
                        </select>
                        de
                        <select name="dateStart[year]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="2017" selected="selected">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <select name="dateStart[hour]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16" selected="selected">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                        </select>
                        :
                        <select name="dateStart[minute]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                        <br><br>
                        <label>Fecha de Finalización</label><br>
                        <select name="dateStart[day]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24" selected="selected">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select> 
                        de
                        <select name="dateStart[month]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="01">enero</option>
                            <option value="02">febrero</option>
                            <option value="03">marzo</option>
                            <option value="04">abril</option>
                            <option value="05">mayo</option>
                            <option value="06">junio</option>
                            <option value="07">julio</option>
                            <option value="08">agosto</option>
                            <option value="09">septiembre</option>
                            <option value="10">octubre</option>
                            <option value="11" selected="selected">noviembre</option>
                            <option value="12">diciembre</option>
                        </select>
                        de
                        <select name="dateStart[year]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="2017" selected="selected">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <select name="dateStart[hour]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19" selected="selected">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                        </select>
                        :
                        <select name="dateStart[minute]" class="form-control valid" style="width:auto;display:inline-block;">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                </div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Información adicional</label>
                        <textarea name="adicional" id="id_adicional" class="form-control" rows="8" cols="14" required="required" placeholder="Escriba aquí la Información adicional del evento"></textarea><br>
                    <label for="">Video</label>
                        <input class="form-control" name="eventName" placeholder="Link de youtube" type="text" /><br>
                    <label for="">Visibilidad</label>
                        <div class="radio">
                          <label>
                          <input type="radio" name="opc" id="op_1" value="op_1">Público (Se publicará este evento)
                        </div>
                        <div class="radio">
                          <label>
                          <input type="radio" name="opc" id="op_2" value="op_2">Privado (No se mostrará este evento públicamente)
                          </label>
                        </div>
                </div>
                <div class="col-xs-1 col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <legend>Ubicación</legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Ciudad</label>
                        <select class="form-control" name="categoria">
                            <option value="Ciudad">Ciudad</option>
                        </select><br>
                    <label for="">Dirección</label>
                        <input class="form-control" name="direccion" placeholder="Dirección donde será el evento" type="text" /><br>
                    <label for="">Referencia</label>
                        <input class="form-control" name="Referencia" placeholder="Ej. A 3 cuadras de la UNSA" type="text" /><br>
                    
                </div>
                <div class="col-xs-5 col-md-5">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.5871874198974!2d-71.52405075505996!3d-16.394978299924194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424bacd71a2591%3A0x568581cab2a28f07!2sPiscina+Municipal+Miraflores!5e0!3m2!1ses-419!2spe!4v1511473482381"></iframe>
                    </div>
                </div>
                <div class="col-xs-1 col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 well well-sm">
                <legend>Precios</legend>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Tipo de moneda</label>
                        <select class="form-control" name="categoria">
                            <option value="Soles" selected="selected">Soles</option>
                            <option value="Dolares">Dolares</option>
                        </select><br>
                </div>
                <div class="col-xs-5 col-md-5">
                    <label for="">Precio</label>
                        <input class="form-control" name="precio" placeholder="00.0" type="text" /><br>
                </div>
                <div class="col-xs-1 col-md-1"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-md-8"></div>
            <div class="col-xs-4 col-md-4">
            <button type="button" class="btn btn-info btn-success btn-lg btn-block">Crear Evento</button><br></div>
        </div>

    </div>

    </form>
</div>

<style type="text/css">
    .well{
        background-color: rgb(248, 248, 248);
        }
</style>

@endsection
