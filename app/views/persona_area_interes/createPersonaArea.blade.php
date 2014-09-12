@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($persona_area))


                          {{ Form::open(array('url' => '/persona_area/crear', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          <br></br>
                          
                          {{ Form::label('fk_persona', 'Persona:') }}  
                          {{ Form::select('fk_persona', array($fk_persona),$fk_persona[1],array('class'=>'form-control')) }}
                          {{$errors->first('fk_persona')}} 

                          {{ Form::label('fk_area','Area:') }}
                          {{ Form::select('fk_area', array($fk_area),$fk_area[1],array('class'=>'form-control')) }}
                          {{$errors->first('fk_area')}}


                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}

               @else

                         {{ Form::open(array('url' => '/persona_area/editar', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          <br></br>

                          {{ Form::label('fk_persona', 'Persona:') }}  
                          {{ Form::select('fk_persona', array($fk_persona),$persona_area->persona->id,array('class'=>'form-control')) }}
                          {{$errors->first('fk_persona')}} 

                          {{ Form::label('fk_area','Area:') }}
                          {{ Form::select('fk_area', array($fk_area),$persona_area->area->id,array('class'=>'form-control')) }}
                          {{$errors->first('fk_area')}}

                          {{ Form::hidden('idedit', $persona_area->id) }}

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