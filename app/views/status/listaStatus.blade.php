@extends('layouts.master')
@section('contenido')
          <div class="starter-template">
        <!--h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p-->


          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla

              {{ Form::open(array('url' => '/status/crear', 'method' => 'GET'))}}
    
              {{ Form::submit('Nuevo Status', array('class' => 'btn btn-primary')) }}

              {{ Form::close() }}

          </p>


          


@foreach ($statues as $status)
<div class="row">
            <br/><br/>
            <div class="col-md-3"> {{ HTML::link('tres', $status->status_nombre, array('id' => 'nam_id'))}}</div>
            
            <div class="col-md-3">
              {{ Form::open(array('url' => 'tres'))}}
              {{ Form::submit('Ver', array('class' => 'btn btn-primary')) }}
              {{ Form::close() }}
            </div>

            <div class="col-md-3">
              {{ Form::open(array('url' => 'status/editar', 'method' => 'GET'))}}
              {{ Form::hidden('idedit', $status->id) }}<!--Aquí passas el valor del ID que se realiza por la consulta a BD-->
              {{ Form::submit('Editar', array('class' => 'btn btn-Editar')) }}
              {{ Form::close() }}
            </div>

            <div class="col-md-3">
              {{ Form::open(array('url' => 'status/eliminar', 'method' => 'POST'))}}
              {{ Form::hidden('idedit', $status->id) }}
              {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
              {{ Form::close() }}
            </div>
                
          </div>
@endforeach
  
      @if(Session::has('notice'))
      <div>
     {{Session::get('notice')}}
      </div>
      @endif

{{$statues->links()}}
          
      </div>
@stop