@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($status))


                {{ Form::open(array('url' => '/status/crear', 'method' => 'POST'))}}
                <div class="form-group">
                <label for="exampleInputEmail1">Nombre de Profesión</label>
                {{ Form::text('status_nombre','', array('class'=>'form-control', 'placeholder'=>"Nombre del Status")) }}
                {{$errors->first('status_nombre')}}

                </div>
                {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                @if(Session::has('message'))
                <div>
               {{Session::get('class')}}">{{Session::get('message')}}
                </div>
                @endif
               
               {{ Form::close() }}

               @else

               {{ Form::open(array('url' => '/status/editar', 'method' => 'POST'))}}
                <div class="form-group">
                <label> Nombre de Status </label>
                {{ Form::text('status_nombre',$status->status_nombre , array('class'=>'form-control', 'placeholder'=>"Nombre del Status")) }}
                {{ Form::hidden('idedit', $status->id) }}
                {{$errors->first('status_nombre')}}
                </div>
                {{ Form::submit('Editar', array('class' => 'btn btn-default')) }}

                 @if(Session::has('message'))
                <div>
                {{Session::get('class')}}">{{Session::get('message')}}
                </div>
                 @endif
                
                {{ Form::close() }}
               

               @endif
            
          </div>
      </div>
      </div>
      @stop