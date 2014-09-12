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

<script type="text/javascript">
  function solicitudOnChange(sel) {
      if (sel.value === "REFERENCIA BIBLIOGRAFICA"){
           $("#referencia").show();
           $("#base_datos").hide();

      }else{

           $("#referencia").hide();
           $("#base_datos").show();

      }
}
</script>



                @if(!isset($solicitud_informacion))

                {{ Form::open(array('url' => '/solicitud_info/crear', 'method' => 'POST')) }}
                <div class="form-group">
                <label>Generar Solicitud de Información</label>

                {{ Form::input('date', 'solicitud_info_fecha',$today , array('class' => 'form-control', 'placeholder' => 'Fecha', 'disabled'), $today)}}
                {{$errors->first('solicitud_info_fecha')}}

                {{ Form::label('solicitud_info_cantidad_paginas','Cantidad de Paginas:') }}
                {{ Form::text('solicitud_info_cantidad_paginas',null, array('class'=>'form-control', 'placeholder'=>'Cantidad de Paginas')) }}
                {{$errors->first('solicitud_info_cantidad_paginas')}}

                {{ Form::label('solicitud_info_modalidad_envio', 'Modalidad de Envio:') }}
                {{ Form::select('solicitud_info_modalidad_envio',array('E-MAIL'=>'E-Mail','OFICINA DE ENLACE DEL IVIC (SOLO EN VZLA)'=>'Oficina de Enlace del IVIC (SOLO EN VZLA)','RECEPCION(EN BIBLIOTECA MARCEL ROCHE)'=>'Recepción (EN BIBLIOTECA MARCEL ROCHE)'),'E-MAIL',array('class'=>'form-control')) }}

                {{ Form::label('solicitud_info_urgente', 'Es Urgente: ')}}
                {{ Form::checkbox('solicitud_info_urgente', 'true', null, array('class'=>'form-control')) }}

                {{ Form::label('solicitud_tipo', 'Tipo de Solicitud:') }}
                {{ Form::select('solicitud_tipo',array('REFERENCIA BIBLIOGRAFICA' => 'Referencia Bibliografica', 'BASE DE DATOS' => 'Base de Datos'),'REFERENCIA BIBLIOGRAFICA',array('class'=>'form-control', 'id' => 'solicitud_tipo', 'name'=>'solicitud_tipo', 'onchange'=>'solicitudOnChange(this)')) }}

                <div id= "referencia" style= "display:show;">

                {{ Form::label('referencia','Referencia:') }}
                {{ Form::text('referencia',null, array('class'=>'form-control', 'placeholder'=>'Referencia'),null) }}
                {{$errors->first('referencia')}}

                {{ Form::label('busqueda_fuente_nacional', 'Busqueda Nacional: ')}}
                {{ Form::checkbox('busqueda_fuente_nacional', 'true',null,array('class'=>'form-control')) }}

                {{ Form::label('busqueda_fuente_internacional', 'Busqueda Internacional: ')}}
                {{ Form::checkbox('busqueda_fuente_internacional', 'true',null,array('class'=>'form-control')) }}

                {{ Form::label('titulo_articulo','Titulo del Articulo:') }}
                {{ Form::text('titulo_articulo',null, array('class'=>'form-control', 'placeholder'=>'Titulo del Articulo')) }}
                {{$errors->first('titulo_articulo')}}

                {{ Form::label('autor','Autor:') }}
                {{ Form::text('autor',null, array('class'=>'form-control', 'placeholder'=>'Autor')) }}
                {{$errors->first('autor')}}

                {{ Form::label('titulo_publicacion','Título de la Publicación:') }}
                {{ Form::text('titulo_publicacion',null, array('class'=>'form-control', 'placeholder'=>'Título de la Publicación')) }}
                {{$errors->first('titulo_publicacion')}}
                 
                {{ Form::label('ano_publicacion','Año de la Publicación:') }}
                {{ Form::selectYear('ano_publicacion', 1900, $year, null, array('class'=>'form-control', 'placeholder'=>'fecha de la Publicación')) }}
                {{$errors->first('ano_publicacion')}}

                {{ Form::label('volumen','Volumen:') }}
                {{ Form::text('volumen', NULL, array('class'=>'form-control', 'placeholder'=>'Volumen')) }}
                {{$errors->first('volumen')}}

                {{ Form::label('numero_publicacion','Número de Publicación:') }}
                {{ Form::text('numero_publicacion',null, array('class'=>'form-control', 'placeholder'=>'Número de Publicación')) }}
                {{$errors->first('numero_publicacion')}}

                {{ Form::label('pagina_inicio','Página de Inicio:') }}
                {{ Form::text('pagina_inicio',null, array('class'=>'form-control', 'placeholder'=>'Página de Inicio')) }}
                {{$errors->first('pagina_inicio')}}

                {{ Form::label('pagina_fin','Página Fin:') }}
                {{ Form::text('pagina_fin',null, array('class'=>'form-control', 'placeholder'=>'Página Fin')) }}
                {{$errors->first('pagina_fin')}}

                </div>

                <div id= "base_datos" style= "display:none;">

                {{ Form::label('nombre_base_datos','Nombre de la Base de Datos:') }}
                {{ Form::text('nombre_base_datos',null, array('class'=>'form-control', 'placeholder'=>'Nombre de la Base de Datos')) }}
                {{$errors->first('nombre_base_datos')}}

                {{ Form::label('ano_inicio','Año de Inicio:') }}
                {{ Form::text('ano_inicio',null, array('class'=>'form-control', 'placeholder'=>'Año de Inicio')) }}
                {{$errors->first('ano_inicio')}}

                {{ Form::label('ano_fin','Año Fin:') }}
                {{ Form::text('ano_fin',null, array('class'=>'form-control', 'placeholder'=>'Año Fin')) }}
                {{$errors->first('ano_fin')}}

                {{ Form::label('idioma','Idioma:') }}
                {{ Form::select('idioma',array('INGLES'=>'Ingles','ESPAÑOL'=>'Español'), 'INGLES', array('class'=>'form-control')) }}
                {{$errors->first('idioma')}}
                 
                {{ Form::label('comentario','Comentario:') }}
                {{ Form::textarea('comentario',null, array('class'=>'form-control', 'size' => '30x5' , 'resize'=>'none','placeholder'=>"Comentario (MAX 150 Carácteres)")) }}
                {{$errors->first('comentario')}}



                </div>



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
               

                {{ Form::open(array('url' => '/solicitud_info/editar', 'method' => 'POST'))}}
                <div class="form-group">
                <label>Generar Solicitud de Información</label>

                {{ Form::input('date', 'solicitud_info_fecha',$solicitud_informacion->solicitud_info_fecha , array('class' => 'form-control', 'placeholder' => 'Fecha', 'disabled'), $solicitud_informacion->solicitud_info_fecha)}}
                {{$errors->first('solicitud_info_fecha')}}

                {{ Form::label('solicitud_info_cantidad_paginas','Cantidad de Paginas:') }}
                {{ Form::text('solicitud_info_cantidad_paginas',$solicitud_informacion->solicitud_info_cantidad_paginas
                , array('class'=>'form-control', 'placeholder'=>'Cantidad de Paginas')) }}
                {{$errors->first('solicitud_info_cantidad_paginas')}}

                {{ Form::label('solicitud_info_modalidad_envio', 'Modalidad de Envio:') }}
                {{ Form::select('solicitud_info_modalidad_envio',array('E-MAIL'=>'E-Mail','OFICINA DE ENLACE DEL IVIC (SOLO EN VZLA)'=>'Oficina de Enlace del IVIC (SOLO EN VZLA)','RECEPCION(EN BIBLIOTECA MARCEL ROCHE)'=>'Recepción (EN BIBLIOTECA MARCEL ROCHE)'),$solicitud_informacion->solicitud_info_modalidad_envio,array('class'=>'form-control')) }}

                {{ Form::label('solicitud_info_urgente', 'Es Urgente: ')}}
                {{ Form::checkbox('solicitud_info_urgente', 'true', $solicitud_informacion->solicitud_info_urgente, array('class'=>'form-control')) }}

                {{ Form::label('solicitud_tipo', 'Tipo de Solicitud:') }}
                {{ Form::select('solicitud_tipo',array('REFERENCIA BIBLIOGRAFICA'=>'Referencia Bibliografica', 'BASE DE DATOS'=>'Base de Datos'),$solicitud_informacion->solicitud_tipo,array('class'=>'form-control', 'id' => 'solicitud_tipo', 'name'=>'solicitud_tipo', 'onchange'=>'solicitudOnChange(this)', 'disabled')) }}

                
                  @if($solicitud_informacion->solicitud_tipo == 'REFERENCIA BIBLIOGRAFICA')

                {{ Form::label('referencia','Referencia:') }}
                {{ Form::text('referencia',$solicitud_informacion->referencia, array('class'=>'form-control', 'placeholder'=>'Referencia'),null) }}
                {{$errors->first('referencia')}}

                {{ Form::label('busqueda_fuente_nacional', 'Busqueda Nacional: ')}}
                {{ Form::checkbox('busqueda_fuente_nacional', 'true',$solicitud_informacion->busqueda_fuente_nacional,array('class'=>'form-control')) }}

                {{ Form::label('busqueda_fuente_internacional', 'Busqueda Internacional: ')}}
                {{ Form::checkbox('busqueda_fuente_internacional', 'true',$solicitud_informacion->busqueda_fuente_internacional,array('class'=>'form-control')) }}

                {{ Form::label('titulo_articulo','Titulo del Articulo:') }}
                {{ Form::text('titulo_articulo',$solicitud_informacion->titulo_articulo, array('class'=>'form-control', 'placeholder'=>'Titulo del Articulo')) }}
                {{$errors->first('titulo_articulo')}}

                {{ Form::label('autor','Autor:') }}
                {{ Form::text('autor',$solicitud_informacion->autor, array('class'=>'form-control', 'placeholder'=>'Autor')) }}
                {{$errors->first('autor')}}

                {{ Form::label('titulo_publicacion','Título de la Publicación:') }}
                {{ Form::text('titulo_publicacion',$solicitud_informacion->titulo_publicacion, array('class'=>'form-control', 'placeholder'=>'Título de la Publicación')) }}
                {{$errors->first('titulo_publicacion')}}
                 
                {{ Form::label('ano_publicacion','Año de la Publicación:') }}
                {{ Form::selectYear('ano_publicacion', 1900, $year, $solicitud_informacion->ano_publicacion, array('class'=>'form-control', 'placeholder'=>'fecha de la Publicación')) }}
                {{$errors->first('ano_publicacion')}}

                {{ Form::label('volumen','Volumen:') }}
                {{ Form::text('volumen', $solicitud_informacion->volumen, array('class'=>'form-control', 'placeholder'=>'Volumen')) }}
                {{$errors->first('volumen')}}

                {{ Form::label('numero_publicacion','Número de Publicación:') }}
                {{ Form::text('numero_publicacion',$solicitud_informacion->numero_publicacion, array('class'=>'form-control', 'placeholder'=>'Número de Publicación')) }}
                {{$errors->first('numero_publicacion')}}

                {{ Form::label('pagina_inicio','Página de Inicio:') }}
                {{ Form::text('pagina_inicio',$solicitud_informacion->pagina_inicio, array('class'=>'form-control', 'placeholder'=>'Página de Inicio')) }}
                {{$errors->first('pagina_inicio')}}

                {{ Form::label('pagina_fin','Página Fin:') }}
                {{ Form::text('pagina_fin',$solicitud_informacion->pagina_fin, array('class'=>'form-control', 'placeholder'=>'Página Fin')) }}
                {{$errors->first('pagina_fin')}}

              
                @else

               

                {{ Form::label('nombre_base_datos','Nombre de la Base de Datos:') }}
                {{ Form::text('nombre_base_datos',$solicitud_informacion->nombre_base_datos, array('class'=>'form-control', 'placeholder'=>'Nombre de la Base de Datos')) }}
                {{$errors->first('nombre_base_datos')}}

                {{ Form::label('ano_inicio','Año de Inicio:') }}
                {{ Form::text('ano_inicio',$solicitud_informacion->ano_inicio, array('class'=>'form-control', 'placeholder'=>'Año de Inicio')) }}
                {{$errors->first('ano_inicio')}}

                {{ Form::label('ano_fin','Año Fin:') }}
                {{ Form::text('ano_fin',$solicitud_informacion->ano_fin, array('class'=>'form-control', 'placeholder'=>'Año Fin')) }}
                {{$errors->first('ano_fin')}}

                {{ Form::label('idioma','Idioma:') }}
                {{ Form::select('idioma',array('INGLES'=>'Ingles','ESPAÑOL'=>'Español'), $solicitud_informacion->idioma, array('class'=>'form-control')) }}
                {{$errors->first('idioma')}}
                 
                {{ Form::label('comentario','Comentario:') }}
                {{ Form::textarea('comentario',$solicitud_informacion->comentario, array('class'=>'form-control', 'size' => '30x5' , 'resize'=>'none','placeholder'=>"Comentario (MAX 150 Carácteres)")) }}
                {{$errors->first('comentario')}}


                @endif


                @if($solicitud_informacion->pk_fk_persona)
                {{ Form::label('solicitante', 'Solicitante:') }}
                {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'persona',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)', 'disabled')) }}

                {{ Form::label('fk_persona', 'Persona:') }}
                {{ Form::select('fk_persona',array('NULL'=> 'No Aplica', $fk_persona),$solicitud_informacion->pk_fk_persona,array('class'=>'form-control')) }}
                @else
                {{ Form::label('solicitante', 'Solicitante:') }}
                {{ Form::select('solicitante',array('persona' => 'Persona', 'empresa' => 'Empresa'),'empresa',array('class'=>'form-control', 'id' => 'solicitante', 'name'=>'solicitante', 'onchange'=>'solicitanteOnChange(this)', 'disabled')) }}

                {{ Form::label('fk_empresa_persona', 'Empresa:') }}
                {{ Form::select('fk_empresa_persona',array('NULL' => 'No aplica', $fk_empresa_persona),$solicitud_informacion->pk_fk_empresa_persona,array('class'=>'form-control')) }}
                @endif



                </div>
                {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                @if(Session::has('message'))
                <div>
               {{Session::get('message')}}
                </div>
                @endif

               {{ Form::hidden('idedit', $solicitud_informacion->id) }}
               {{ Form::close() }}

                
               

               @endif
            
          </div>
      </div>
      </div>

      @stop