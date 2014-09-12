@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>



              <script type="text/javascript">
                function solicitanteOnChange(sel) {
                  if (sel.value === "persona"){
                       
                       $("#fk_persona").show();
                       $("#fk_empresa").hide();
                       var ele = document.getElementsByName("solicitud_empresa");
                       for(var i=0;i<ele.length;i++)
                       ele[i].checked = false;


                  }else{
                    
                       $("#fk_persona").hide();
                          var ele = document.getElementsByName("solicitud_persona");
                          for(var i=0;i<ele.length;i++)
                          ele[i].checked = false;
                       $("#fk_empresa").show();
                       
                     }
                   }
              </script>





                @if(!isset($solicitud_status))

                {{ Form::open(array('url' => '/status_solicitud/crear', 'method' => 'POST'))}}
                <div class="form-group">
               <p> <label>Generar Relación entre Empresa y Persona</label></p>

                {{ Form::label('pk_fk_status', 'Status:') }}
                {{ Form::select('pk_fk_status',$pk_fk_status,null,array('class'=>'form-control')) }}

                {{ Form::label('solicitante', 'Solicitante:') }}
                {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'persona',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)')) }}

                <div id="fk_persona" style="display:show;">
               
                

                @foreach ($fk_solicitud_personas as $solicitud)

                  {{ Form::label('solicitud_persona',$solicitud->datos_persona_solicitud,array('class'=> 'form-control')) }} 
                  {{ Form::radio('solicitud_persona', $solicitud->id,null,array('class'=>'form-control', 'id'=>'solicitud_persona')) }}
                  

                
                @endforeach
                {{$fk_solicitud_personas->links()}}


                </div>

                <div id="fk_empresa" style="display:none;">
               
                

                @foreach ($fk_solicitud_empresas as $solicitud_empresa)

                  {{ Form::label('solicitud_empresa',$solicitud_empresa->datos_empresa_solicitud,array('class'=> 'form-control')) }} 
                  {{ Form::radio('solicitud_empresa', $solicitud_empresa->id,null,array('class'=>'form-control','id'=>'solicitud_empresa')) }}
                  

                
                @endforeach
                {{$fk_solicitud_empresas->links()}}


                </div>                


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