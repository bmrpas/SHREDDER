@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>


                          {{ Form::open(array('url' => '/', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Login de Usuario</label>
                          {{ Form::text('usuario_login','', array('class'=>'form-control', 'placeholder'=>"Nombre de Usuario")) }}
                          {{$errors->first('usuario_login')}}
                          {{ Form::password('usuario_password',array('class'=>'form-control', 'placeholder'=>"Clave de Usuario")) }}
                          {{$errors->first('usuario_password')}}

                          </div>
                          {{ Form::submit('Enviar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}


            
          </div>
      </div>
      </div>
      @stop