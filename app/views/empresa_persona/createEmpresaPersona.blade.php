@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>





                @if(!isset($empresa_persona))

                {{ Form::open(array('url' => '/empresa_persona/crear', 'method' => 'POST'))}}
                <div class="form-group">
               <p> <label>Generar Relación entre Empresa y Persona</label></p>

                {{ Form::label('fk_empresa', 'Empresa:') }}
                {{ Form::select('fk_empresa',$fk_empresa,null,array('class'=>'form-control')) }}

                {{ Form::label('fk_persona', 'Persona:') }}
                {{ Form::select('fk_persona',$fk_persona,null,array('class'=>'form-control')) }}

                {{ Form::label('es_representante', 'Es Representante: ')}}
                {{ Form::checkbox('es_representante', 'true',null,array('class'=>'form-control')) }}


                </div>
                {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                @if(Session::has('message'))
                <div>
               {{Session::get('message')}}
                </div>
                @endif

                
               
               {{ Form::close() }}

               @else

               {{$empresa_persona->empresa->full_name}}
               {{$empresa_persona->representante->full_name}}

               {{ Form::open(array('url' => '/empresa_persona/editar', 'method' => 'POST'))}}
                <div class="form-group">
                  
                <label>Generar Relación entre Empresa y Persona</label>
                
                {{ Form::label('fk_empresa', 'Empresa:') }}
                {{ Form::select('fk_empresa', array($fk_empresa), $empresa_persona->empresa->id, array('class'=>'form-control')) }}

                {{ Form::label('fk_persona', 'Persona:') }}
                {{ Form::select('fk_persona', array($fk_persona), $empresa_persona->representante->id, array('class'=>'form-control')) }}

                {{ Form::label('es_representante', 'Es Representante: ')}}
                {{ Form::checkbox('es_representante', 'true', $empresa_persona->es_representante, array('class'=>'form-control')) }}

                {{ Form::hidden('idedit', $empresa_persona->id) }}
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