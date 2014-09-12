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



                @if(!isset($telefono))

                {{ Form::open(array('url' => '/telefono/crear', 'method' => 'POST'))}}
                <div class="form-group">
                <label>Registrar Teléfono</label>

                {{ Form::label('telefono','Teléfono:') }}
                {{ Form::text('telefono',null, array('class'=>'form-control', 'placeholder'=>'Teléfono primario')) }}
                {{$errors->first('telefono')}}

                {{ Form::label('telefono_secundario','Teléfono Secundario:') }}
                {{ Form::text('telefono_secundario',null, array('class'=>'form-control', 'placeholder'=>'Teléfono Secundario')) }}
                {{$errors->first('telefono_secundario')}}

                {{ Form::label('telefono_fax','Teléfono Fax:') }}
                {{ Form::text('telefono_fax',null, array('class'=>'form-control', 'placeholder'=>'Teléfono Fax')) }}
                {{$errors->first('telefono_fax')}}



                {{ Form::label('solicitante', 'Solicitante:') }}
                {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'persona',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)')) }}


                    <div id="fk_persona" style="display: show;">

                {{ Form::label('fk_persona', 'Persona:') }}
                {{ Form::select('fk_persona',array('NULL'=> 'No Aplica', $fk_persona),'NULL',array('class'=>'form-control')) }}
              
                    </div>

                    <div id="fk_empresa" style="display: none;">

                {{ Form::label('fk_empresa', 'Empresa:') }}
                {{ Form::select('fk_empresa',array('NULL' => 'No aplica', $fk_empresa),'NULL',array('class'=>'form-control')) }}
                    
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
               

                {{ Form::open(array('url' => '/telefono/editar', 'method' => 'POST'))}}
                <div class="form-group">
                <label>Editar Teléfonos</label>
                        
                         @if($telefono->fk_persona)

                      {{ Form::label('telefono','Teléfono:') }}
                      {{ Form::text('telefono',$telefono->telefono, array('class'=>'form-control', 'placeholder'=>'Teléfono primario')) }}
                      {{$errors->first('telefono')}}

                      {{ Form::label('telefono_secundario','Teléfono Secundario:') }}
                      {{ Form::text('telefono_secundario',$telefono->telefono_secundario, array('class'=>'form-control', 'placeholder'=>'Teléfono Secundario')) }}
                      {{$errors->first('telefono_secundario')}}

                      {{ Form::label('telefono_fax','Teléfono Fax:') }}
                      {{ Form::text('telefono_fax',$telefono->telefono_fax, array('class'=>'form-control', 'placeholder'=>'Teléfono Fax')) }}
                      {{$errors->first('telefono_fax')}}


                         <!-- <div id="fk_persona" style="display: show;">-->

                      {{ Form::label('solicitante', 'Solicitante:') }}
                      {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'persona',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)','disabled')) }}


                         <!-- <div id="fk_persona" style="display: show;">-->

                      {{ Form::label('fk_persona', 'Persona:') }}
                      {{ Form::select('fk_persona',array('NULL'=> 'No Aplica', $fk_persona),$telefono->fk_persona, array('class'=>'form-control', 'disabled')) }}

                          <!--</div>-->

                        @elseif ($telefono->fk_empresa) 
                          
                      {{ Form::label('telefono','Teléfono:') }}
                      {{ Form::text('telefono',$telefono->telefono, array('class'=>'form-control', 'placeholder'=>'Teléfono primario')) }}
                      {{$errors->first('telefono')}}

                      {{ Form::label('telefono_secundario','Teléfono Secundario:') }}
                      {{ Form::text('telefono_secundario',$telefono->telefono_secundario, array('class'=>'form-control', 'placeholder'=>'Teléfono Secundario')) }}
                      {{$errors->first('telefono_secundario')}}

                      {{ Form::label('telefono_fax','Teléfono Fax:') }}
                      {{ Form::text('telefono_fax',$telefono->telefono_fax, array('class'=>'form-control', 'placeholder'=>'Teléfono Fax')) }}
                      {{$errors->first('telefono_fax')}}


                      {{ Form::label('solicitante', 'Solicitante:') }}
                      {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'empresa',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)','disabled')) }}

                      
                          <!--<div id="fk_empresa" style="display: none;">-->

                      {{ Form::label('fk_empresa', 'Empresa:') }}
                      {{ Form::select('fk_empresa',array('NULL' => 'No aplica', $fk_empresa),$telefono->fk_empresa,array('class'=>'form-control', 'disabled')) }}
                          
                          <!--</div>-->

                          

                        @endif


                </div>
                {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                {{ Form::hidden('idedit', $telefono->id) }}

               
               {{ Form::close() }}
               

               @endif
            
          </div>
      </div>
      </div>

      @stop