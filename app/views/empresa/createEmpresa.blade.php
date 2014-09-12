@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($empresa))


                          {{ Form::open(array('url' => '/empresa/crear', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          {{ Form::text('empresa_rif',null, array('class'=>'form-control', 'placeholder'=>"RIF de la Empresa")) }}
                          {{$errors->first('empresa_rif')}}
                          
                          {{ Form::text('empresa_nombre',null, array('class'=>'form-control', 'placeholder'=>"Nombre de la Empresa")) }}
                          {{$errors->first('empresa_nombre')}}
                          
                          {{ Form::text('empresa_siglas',null, array('class'=>'form-control', 'placeholder'=>"Siglas de la Empresa")) }}
                          {{$errors->first('empresa_siglas')}}
                          
                          {{ Form::label('empresa_tipo_institucion', 'Tipo de Institución:') }}
                          {{ Form::select('empresa_tipo_institucion', array('GUBERNAMENTAL' => 'Gubernamental', 'PRIVADA' => 'Privada', 'MIXTA' => 'Mixta'), 'Gubernamental' , array('class' => 'form-control')) }}
                          {{$errors->first('empresa_tipo_institucion')}}

                          {{ Form::label('fk_lugar', 'Lugar de Procedencia:') }}
                          {{ Form::select('fk_lugar', array($fk_lugar), $fk_lugar[1], array('class'=> 'form-control')) }}
                          {{$errors->first('fk_lugar')}}

                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}

               @else

                         {{ Form::open(array('url' => '/empresa/editar', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Nombre de la Forma de Busqueda</label>
                          {{ Form::text('empresa_rif',$empresa->empresa_rif, array('class'=>'form-control', 'placeholder'=>"RIF de la Empresa")) }}
                          {{$errors->first('empresa_rif')}}
                          
                          {{ Form::text('empresa_nombre',$empresa->empresa_nombre, array('class'=>'form-control', 'placeholder'=>"Nombre de la Empresa")) }}
                          {{$errors->first('empresa_nombre')}}
                          
                          {{ Form::text('empresa_siglas',$empresa->empresa_siglas, array('class'=>'form-control', 'placeholder'=>"Siglas de la Empresa")) }}
                          {{$errors->first('empresa_siglas')}}
                          
                          {{ Form::label('empresa_tipo_institucion', 'Tipo de Institución:') }}
                          {{ Form::select('empresa_tipo_institucion', array('GUBERNAMENTAL' => 'Gubernamental', 'PRIVADA' => 'Privada', 'MIXTA' => 'Mixta'), $empresa->empresa_tipo_institucion , array('class' => 'form-control')) }}
                          {{$errors->first('empresa_tipo_institucion')}}

                          {{ Form::label('fk_lugar', 'Lugar de Procedencia:') }}
                          {{ Form::select('fk_lugar', array($fk_lugar), $empresa->lugar->id, array('class'=> 'form-control')) }}
                          {{$errors->first('fk_lugar')}}

                          {{ Form::hidden('idedit', $empresa->id) }}

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