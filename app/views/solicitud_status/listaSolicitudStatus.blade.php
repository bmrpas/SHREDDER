@extends('layouts.master')
@section('contenido')
          <div class="starter-template">
        <!--h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p-->


          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla

              {{ Form::open(array('url' => '/status_solicitud/crear', 'method' => 'GET'))}}
    
              {{ Form::submit('Nuevo Status para Solicitud de Informacion', array('class' => 'btn btn-primary')) }}

              {{ Form::close() }}

          </p>

<script type="text/javascript">
  function solicitanteOnChange(sel) {
      if (sel.value === "persona"){
           $("#fk_persona").show();
           $("#fk_empresa").hide();

      }else{

           $("#fk_persona").hide();
           $("#fk_empresa").show();

      }
}
</script>
          
                {{ Form::label('solicitante', 'Solicitante:') }}
                {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'persona',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)')) }}

<div id="fk_persona" style="display:show;">

@foreach ($solicitud_status as $solicitud)
<div  class="row">
            <br/><br/>
            




            <div  class="col-md-3"> {{ HTML::link('tres', $solicitud->solicitud->datos_persona_solicitud.' | '.$solicitud->status->status_nombre , array('id' => 'nam_id'))}}</div>

           
            <div class="col-md-3">
              {{ Form::open(array('url' => 'tres'))}}
              {{ Form::submit('Ver', array('class' => 'btn btn-primary')) }}
              {{ Form::close() }}
            </div>

            <div class="col-md-3">
              {{ Form::open(array('url' => 'solicitud_info/editar', 'method' => 'GET'))}}
              {{ Form::hidden('idedit', $solicitud->id) }}<!--Aquí pasas el valor del ID que se realiza por la consulta a BD-->
              {{ Form::submit('Editar', array('class' => 'btn btn-Editar')) }}
              {{ Form::close() }}
            </div>

            <div class="col-md-3">
              {{ Form::open(array('url' => 'solicitud_info/eliminar', 'method' => 'POST'))}}
              {{ Form::hidden('idedit', $solicitud->id) }}
              {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
              {{ Form::close() }}
            </div>



                
          </div>
@endforeach

{{$solicitud_status->links()}}
 </div>

<div id="fk_empresa" style="display:none;" >

@foreach ($solicitud_status as $solicitud_empresa)
<div  class="row">
            <br/><br/>
            

            <div  class="col-md-3"> {{ HTML::link('tres', $solicitud_empresa->SHREDDER.' | '.$solicitud->status->status_nombre , array('id' => 'nam_id'))}}</div>

           
            <div class="col-md-3">
              {{ Form::open(array('url' => 'tres'))}}
              {{ Form::submit('Ver', array('class' => 'btn btn-primary')) }}
              {{ Form::close() }}
            </div>

            <div class="col-md-3">
              {{ Form::open(array('url' => 'solicitud_info/editar', 'method' => 'GET'))}}
              {{ Form::hidden('idedit', $solicitud_empresa->id) }}<!--Aquí pasas el valor del ID que se realiza por la consulta a BD-->
              {{ Form::submit('Editar', array('class' => 'btn btn-Editar')) }}
              {{ Form::close() }}
            </div>

            <div class="col-md-3">
              {{ Form::open(array('url' => 'solicitud_info/eliminar', 'method' => 'POST'))}}
              {{ Form::hidden('idedit', $solicitud_empresa->id) }}
              {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
              {{ Form::close() }}
            </div>



                
          </div>
@endforeach

{{$solicitud_status->links()}}
 </div>




      </div>
@stop