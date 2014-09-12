@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($rol_usuario))


                          {{ Form::open(array('url' => '/rol_usuario/crear', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          <br></br>
                          
                          {{ Form::label('fk_rol', 'Rol:') }}  
                          {{ Form::select('fk_rol', array($fk_rol),$fk_rol[1],array('class'=>'form-control')) }}
                          {{$errors->first('fk_rol')}} 

                          {{ Form::label('fk_usuario','Usuario:') }}
                          {{ Form::select('fk_usuario', array($fk_usuario),$fk_usuario[1],array('class'=>'form-control')) }}
                          {{$errors->first('fk_usuario')}}


                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}

               @else

                         {{ Form::open(array('url' => '/rol_usuario/editar', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          <br></br>

                          {{ Form::label('fk_rol', 'Rol:') }}  
                          {{ Form::select('fk_rol', array($fk_rol),$rol_usuario->rol->id,array('class'=>'form-control')) }}
                          {{$errors->first('fk_rol')}} 

                          {{ Form::label('fk_usuario','Usuario:') }}
                          {{ Form::select('fk_usuario', array($fk_usuario),$rol_usuario->usuario->id,array('class'=>'form-control')) }}
                          {{$errors->first('fk_usuario')}}

                          {{ Form::hidden('idedit', $rol_usuario->id) }}

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