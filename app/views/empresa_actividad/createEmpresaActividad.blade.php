@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($empresa_actividad))


                          {{ Form::open(array('url' => '/empresa_actividad/crear', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          <br></br>
                          
                          {{ Form::label('fk_empresa', 'Empresa:') }}  
                          {{ Form::select('fk_empresa', array($fk_empresa),$fk_empresa[1],array('class'=>'form-control')) }}
                          {{$errors->first('fk_empresa')}} 

                          {{ Form::label('fk_actividad','Actividad:') }}
                          {{ Form::select('fk_actividad', array($fk_actividad),$fk_actividad[1],array('class'=>'form-control')) }}
                          {{$errors->first('fk_actividad')}}


                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}

               @else

                         {{ Form::open(array('url' => '/empresa_actividad/editar', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          <br></br>

                          {{ Form::label('fk_empresa', 'Empresa:') }}  
                          {{ Form::select('fk_empresa', array($fk_empresa),$empresa_actividad->empresa->id,array('class'=>'form-control')) }}
                          {{$errors->first('fk_empresa')}} 

                          {{ Form::label('fk_actividad','Actividad:') }}
                          {{ Form::select('fk_actividad', array($fk_actividad),$empresa_actividad->actividad->id,array('class'=>'form-control')) }}
                          {{$errors->first('fk_actividad')}}

                          {{ Form::hidden('idedit', $empresa_actividad->id) }}

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