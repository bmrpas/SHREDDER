@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($rol_accion))


                          {{ Form::open(array('url' => '/rol_accion/crear', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          <br></br>
                          
                          {{ Form::label('fk_rol', 'Rol:') }}  
                          {{ Form::select('fk_rol', array($fk_rol),$fk_rol[1],array('class'=>'form-control')) }}
                          {{$errors->first('fk_rol')}} 

                          {{ Form::label('fk_accion','Acción:') }}
                          {{ Form::select('fk_accion', array($fk_accion),$fk_accion[1],array('class'=>'form-control')) }}
                          {{$errors->first('fk_accion')}}


                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}

               @else

                         {{ Form::open(array('url' => '/rol_accion/editar', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          <br></br>

                          {{ Form::label('fk_rol', 'Rol:') }}  
                          {{ Form::select('fk_rol', array($fk_rol),$rol_accion->rol->id,array('class'=>'form-control')) }}
                          {{$errors->first('fk_rol')}} 

                          {{ Form::label('fk_accion','Acción:') }}
                          {{ Form::select('fk_accion', array($fk_accion),$rol_accion->accion->id,array('class'=>'form-control')) }}
                          {{$errors->first('fk_accion')}}

                          {{ Form::hidden('idedit', $rol_accion->id) }}

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