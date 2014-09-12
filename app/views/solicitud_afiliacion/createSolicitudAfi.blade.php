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

      }else{

           $("#fk_persona").hide();
           $("#fk_empresa").show();

      }
}
</script>



                @if(!isset($solicitud_afiliacion))

                {{ Form::open(array('url' => '/solicitud_afiliacion/crear', 'method' => 'POST'))}}
                <div class="form-group">
                <label>Generar Solicitud de Afiliación</label>

                {{ Form::textarea('solicitud_direccion_exacta',null, array('class'=>'form-control', 'size' => '30x5' , 'resize'=>'none','placeholder'=>"Dirección Exacta (MAX 150 Carácteres)")) }}
                {{$errors->first('solicitud_direccion_exacta')}}

                {{ Form::input('date', 'solicitud_fecha',$today , array('class' => 'form-control', 'placeholder' => 'Fecha', 'disabled'), $today)}}
                {{$errors->first('solicitud_fecha')}}

                {{ Form::label('solicitante', 'Solicitante:') }}
                {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'persona',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)')) }}


                    <div id="fk_persona" style="display: show;">

                {{ Form::label('fk_persona', 'Persona:') }}
                {{ Form::select('fk_persona',array('NULL'=> 'No Aplica', $fk_persona),'NULL',array('class'=>'form-control')) }}
              
                    </div>

                    <div id="fk_empresa" style="display: none;">

                {{ Form::label('fk_empresa_persona', 'Empresa:') }}
                {{ Form::select('fk_empresa_persona',array('NULL' => 'No aplica', $fk_empresa_persona),'NULL',array('class'=>'form-control')) }}
                    
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
               

                {{ Form::open(array('url' => '/solicitud_afiliacion/editar', 'method' => 'POST'))}}
                <div class="form-group">
                <label>Generar Solicitud de Afiliación</label>

                {{ Form::textarea('solicitud_direccion_exacta',$solicitud_afiliacion->solicitud_direccion_exacta, array('class'=>'form-control', 'size' => '30x5' , 'resize'=>'none','placeholder'=>"Dirección Exacta (MAX 150 Carácteres)")) }}
                {{$errors->first('solicitud_direccion_exacta')}}

                {{ Form::input('date', 'solicitud_fecha',$solicitud_afiliacion->solicitud_fecha , array('class' => 'form-control', 'placeholder' => 'Fecha', 'disabled'), $solicitud_afiliacion->solicitud_fecha)}}
                {{$errors->first('solicitud_fecha')}}

                        
                         @if($solicitud_afiliacion->pk_fk_persona)

                      {{ Form::label('solicitante', 'Solicitante:') }}
                      {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'persona',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)','disabled')) }}


                         <!-- <div id="fk_persona" style="display: show;">-->

                      {{ Form::label('fk_persona', 'Persona:') }}
                      {{ Form::select('fk_persona',array('NULL'=> 'No Aplica', $fk_persona),$solicitud_afiliacion->pk_fk_persona, array('class'=>'form-control')) }}
                  
                  

                          <!--</div>-->

                        @elseif ($solicitud_afiliacion->pk_fk_empresa_persona) 
                          
                        

                      {{ Form::label('solicitante', 'Solicitante:') }}
                      {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'empresa',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)','disabled')) }}

                      
                          <!--<div id="fk_empresa" style="display: none;">-->

                      {{ Form::label('fk_empresa_persona', 'Empresa:') }}
                      {{ Form::select('fk_empresa_persona',array('NULL' => 'No aplica', $fk_empresa_persona),$solicitud_afiliacion->pk_fk_empresa_persona,array('class'=>'form-control')) }}
                          
                          <!--</div>-->

                          {{$solicitud_afiliacion}}

                        @endif


                </div>
                {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                {{ Form::hidden('idedit', $solicitud_afiliacion->id) }}

               
               {{ Form::close() }}
               

               @endif
            
          </div>
      </div>
      </div>

      @stop