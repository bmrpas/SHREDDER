@extends('index')

@section('contenido')
<ul>
	<p>Profesión</p>
@foreach ($profesiones as $profesion)
		<p><li>{{ $profesion->profesion_nombre }}</li></p>
@endforeach
</ul>

{{$profesiones->links()}}

@stop

