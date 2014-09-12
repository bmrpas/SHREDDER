@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($usuario))


                          {{ Form::open(array('url' => '/usuario/crear', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          {{ Form::text('usuario_login','', array('class'=>'form-control', 'placeholder'=>"Nombre de Usuario")) }}
                          {{$errors->first('usuario_login')}}
                          {{ Form::password('usuario_password',array('class'=>'form-control', 'placeholder'=>"Clave de Usuario")) }}
                          {{$errors->first('usuario_password')}}
                          {{ Form::password('usuario_password_repite',array('class'=>'form-control', 'placeholder'=>"Repita Clave de Usuario")) }}
                          {{$errors->first('usuario_password_repite')}}
                          {{ Form::select('fk_persona', array($fk_persona),null,array('class'=>'form-control')) }}
                          {{$errors->first('fk_persona')}}

                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}

               @else

                         {{ Form::open(array('url' => '/usuario/editar', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          {{ Form::text('usuario_login', $usuario->usuario_login , array('class'=>'form-control', 'placeholder'=>"Nombre de Usuario", 'disabled')) }}
                          {{$errors->first('usuario_login')}}
                          {{ Form::password('usuario_password',array('class'=>'form-control', 'placeholder'=>"Clave de Usuario")) }}
                          {{$errors->first('usuario_password')}}
                          {{ Form::password('usuario_password_repite',array('class'=>'form-control', 'placeholder'=>"Repita Clave de Usuario")) }}
                          {{$errors->first('usuario_password_repite')}}
                          {{ Form::select('fk_persona', array($fk_persona), $usuario->persona->id, array('class'=>'form-control')) }}
                          {{$errors->first('fk_persona')}}
                          {{ Form::hidden('idedit', $usuario->id) }}

                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}
                         

               @endif
            
          </div>
      </div>
      </div>
      @stop