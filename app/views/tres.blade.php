@extends('layouts.master')
@section('accion')
        


    {{--*/ $var = Input::get('nuep') /*--}}

{{$accion=Input::get('nuep')}}
{{$id=Input::get('idedit')}}
    
    @if  ($accion == "nvp")
    <p><h4> <b> Nueva </b> Profesión </h4></p>
            
            @include('profesion')
    

    @elseif ($accion == "envp")
    <p> <h4>   <b> Editar </b> Profesión </h4></p>
    		$var=editar.php
            @include('profesion')
    @endif
   




     
@stop