@extends('index')



@section('contenido')

@if(isset($datos))

<p>Profesión: {{$datos['profesion_nombre']}}</p>

@else

{{Form::open(array('method' => 'POST', 'url' => 'agregarProfesion'))}}

<p>{{Form::label('profesion_nombre', 'Profesion: ')}}
{{Form::text('profesion_nombre')}}</p>
{{$errors->first('profesion_nombre')}}

<p>{{Form::submit('Registrar')}}</p>

@if(Session::has('message'))
<div>
	{{Session::get('class')}}">{{Session::get('message')}}
</div>
@endif

{{Form::close()}}


@stop

@endif