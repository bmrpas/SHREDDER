@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($lugar))


                          {{ Form::open(array('url' => '/lugar/crear', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          {{ Form::text('lugar_nombre','', array('class'=>'form-control', 'placeholder'=>"Nombre del Lugar")) }}
                          {{$errors->first('lugar_nombre')}}
                          {{ Form::text('lugar_codigo_postal','', array('class'=>'form-control', 'placeholder'=>"Código Postal")) }}
                          {{$errors->first('lugar_codigo_postal')}}
                          {{ Form::select('fk_lugar', array('NULL' => 'No Aplica',$fk_lugar),'NULL') }}
                          {{$errors->first('fk_lugar')}}
                          {{ Form::select('fk_lugar_tipo', $fk_lugar_tipo) }}
                          {{$errors->first('fk_lugar_tipo')}}

                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}

               @else

                         {{ Form::open(array('url' => '/lugar/editar', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          {{ Form::text('lugar_nombre',$lugar->lugar_nombre, array('class'=>'form-control', 'placeholder'=>"Nombre del Lugar")) }}
                          {{$errors->first('lugar_nombre')}}
                          {{ Form::text('lugar_codigo_postal',$lugar->lugar_codigo_postal, array('class'=>'form-control', 'placeholder'=>"Código Postal")) }}
                          {{$errors->first('lugar_codigo_postal')}}

                          @if($lugar->fk_lugar)
                          {{ Form::select('fk_lugar', array('NULL' => 'No Aplica', $fk_lugar), $lugar->lugarRecursivo->id) }}
                          {{$errors->first('fk_lugar')}}
                          @else 
                          {{ Form::select('fk_lugar', array('NULL' => 'No Aplica',$fk_lugar)) }}
                          {{$errors->first('fk_lugar')}}
                          @endif

                          {{ Form::select('fk_lugar_tipo', array($fk_lugar_tipo), $lugar->lugarTipo->id) }}
                          {{$errors->first('fk_lugar_tipo')}}
                          {{ Form::hidden('idedit', $lugar->id) }}

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