@extends('layouts.master')
@section('uno')
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla</p>


          <div class="row">
            <div class="col-md-4"> {{ HTML::link('dos', 'Profesión', array('id' => 'nam_id'))}}</div>
            <div class="col-md-4"> <a href="javascript:;">Areas de Interes</a> </div>
            <div class="col-md-4"> {{ HTML::link('status', 'Status', array('id' => 'nam_id'))}}</div>
            <div class="col-md-4"> <a href="javascript:;">Usuarios</a> </div>
            <div class="col-md-4"> <a href="javascript:;">Lugares</a> </div>
            <div class="col-md-4"> <a href="javascript:;">Télefonos</a> </div>
            <div class="col-md-4"> <a href="javascript:;">Solicitud</a> </div>
            <div class="col-md-4"> <a href="javascript:;">Actividad Economica</a> </div>
            <div class="col-md-4"> <a href="javascript:;"></div>

          </div>
@stop