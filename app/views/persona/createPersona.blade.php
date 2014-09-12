@extends('layouts.master')
@section('contenido')
<div class="container">
 <div class="starter-template">
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla
          </p>

          <div class="row">
            <div class="col-md-12">
              <br/><br/>

               
                @if(!isset($persona))


                          {{ Form::open(array('url' => '/persona/crear', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Registro de Persona</label>
                          {{ Form::text('persona_cid',NULL, array('class'=>'form-control', 'placeholder'=>"Número de Documeto de Identificación")) }}
                          {{$errors->first('persona_cid')}}
                          
                          {{ Form::text('persona_primer_apellido',NULL, array('class'=>'form-control', 'placeholder'=>"Primer Apellido")) }}
                          {{$errors->first('persona_primer_apellido')}}
                          
                          {{ Form::text('persona_segundo_apellido','', array('class'=>'form-control', 'placeholder'=>"Segundo Apellido")) }}
                          {{$errors->first('persona_segundo_apellido')}}
                          
                          {{ Form::text('persona_primer_nombre',NULL, array('class'=>'form-control', 'placeholder'=>"Primer Nombre")) }}
                          {{$errors->first('persona_primer_nombre')}}
                          
                          {{ Form::text('persona_segundo_nombre',NULL, array('class'=>'form-control', 'placeholder'=>"Segundo Nombre"), 'NULL') }}
                          {{$errors->first('persona_segundo_nombre')}}
                          
                          {{ Form::label('persona_sexo', 'Género:') }}
                          {{ Form::select('persona_sexo',array('M' => 'Masculino', 'F' => 'Femenino'),'M',array('class'=>'form-control')) }}

                          {{ Form::input('date', 'persona_fecha_nac', null, array('class' => 'form-control', 'placeholder' => 'Fecha')) }}
                          {{$errors->first('persona_fecha_nac')}}
                          
                          {{ Form::label('persona_grado_instruccion', 'Grado de Instrucción') }}
                          {{ Form::select('persona_grado_instruccion', array('TECNICA SUPERIOR'=>'Tecnica Superior','UNIVERSITARIA'=>'Universitaria','POSTGRADO'=>'Postgrado','PRIMARIA'=>'Primaria','BASICA'=>'Básica','MEDIA/DIVERSIFICADA'=>'Media/Diversificada'), 'TECNICA SUPERIOR', array('class'=>'form-control')) }}
                          
                          {{ Form::email('persona_mail', null, array('class' => 'form-control', 'placeholder' => 'Correo Electronico')) }}
                          {{$errors->first('persona_mail')}} 
                          
                          {{ Form::text('persona_departamento', NULL, array('class'=>'form-control', 'placeholder'=> "Departamento"), 'NULL') }}
                          {{ $errors->first('persona_departamento') }}
                          
                          {{ Form::label('fk_profesion', 'Profesión:') }}
                          {{ Form::select('fk_profesion', array($fk_profesion),$fk_profesion[1], array('class'=>'form-control')) }}
                          {{$errors->first('fk_profesion')}}
                          
                          {{ Form::label('fk_cargo', 'Cargo') }}
                          {{ Form::select('fk_cargo', array($fk_cargo), $fk_cargo[1], array('class'=>'form-control')) }}
                          {{$errors->first('fk_cargo')}}
                          
                          {{ Form::label('fk_lugar', 'Lugar de Procedencia:') }}
                          {{ Form::select('fk_lugar', array($fk_lugar), $fk_lugar[1], array('class'=> 'form-control')) }}
                          {{$errors->first('fk_lugar')}}
                          
                          {{ Form::label('fk_persona_a_quien_autorizo', 'Persona Autorizada:') }}
                          {{ Form::select('fk_persona_a_quien_autorizo', array('NULL' => 'No Aplica',$fk_persona_a_quien_autorizo), 'NULL', array('class'=> 'form-control')) }}
                          {{$errors->first('fk_persona_a_quien_autorizo')}}



                          </div>
                          {{ Form::submit('Agregar', array('class' => 'btn btn-default')) }}

                          @if(Session::has('message'))
                          <div>
                         {{Session::get('message')}}
                          </div>
                          @endif
                         
                         {{ Form::close() }}

               @else

                         {{ Form::open(array('url' => '/persona/editar', 'method' => 'POST'))}}
                          <div class="form-group">
                          <label>Registro de Persona</label>
                          
                          {{ Form::text('persona_cid',$persona->persona_cid, array('class'=>'form-control', 'placeholder'=>"Número de Documeto de Identificación", 'disabled')) }}
                          {{$errors->first('persona_cid')}}
                          
                          {{ Form::text('persona_primer_apellido',$persona->persona_primer_apellido, array('class'=>'form-control', 'placeholder'=>"Primer Apellido")) }}
                          {{$errors->first('persona_primer_apellido')}}
                          
                          {{ Form::text('persona_segundo_apellido',$persona->persona_segundo_apellido, array('class'=>'form-control', 'placeholder'=>"Segundo Apellido"),'null') }}
                          {{$errors->first('persona_segundo_apellido')}}
                          
                          {{ Form::text('persona_primer_nombre',$persona->persona_primer_nombre, array('class'=>'form-control', 'placeholder'=>"Primer Nombre")) }}
                          {{$errors->first('persona_primer_nombre')}}
                          
                          {{ Form::text('persona_segundo_nombre',$persona->persona_segundo_nombre, array('class'=>'form-control', 'placeholder'=>"Segundo Nombre")) }}
                          {{$errors->first('persona_segundo_nombre')}}
                          
                          {{ Form::label('persona_sexo', 'Género:') }}
                          {{ Form::select('persona_sexo',array('M' => 'Masculino', 'F' => 'Femenino'),$persona->persona_sexo,array('class'=>'form-control')) }}

                          {{ Form::input('date', 'persona_fecha_nac', $persona->persona_fecha_nac, array('class' => 'form-control', 'placeholder' => 'Fecha')) }}
                          {{$errors->first('persona_fecha_nac')}}
                          
                          {{ Form::label('persona_grado_instruccion', 'Grado de Instrucción') }}
                          {{ Form::select('persona_grado_instruccion', array('TECNICA SUPERIOR'=>'Tecnica Superior','UNIVERSITARIA'=>'Universitaria','POSTGRADO'=>'Postgrado','PRIMARIA'=>'Primaria','BÁSICA'=>'Básica','MEDIA/DIVERSIFICADA'=>'Media/Diversificada'), $persona->persona_grado_instruccion, array('class'=>'form-control')) }}
                          
                          {{ Form::email('persona_mail', $persona->persona_mail, array('class' => 'form-control', 'placeholder' => 'Correo Electronico', 'disabled')) }}
                          {{$errors->first('persona_mail')}} 
                          
                          {{ Form::text('persona_departamento', $persona->persona_departamento, array('class'=>'form-control', 'placeholder'=> "Departamento"),null) }}
                          {{ $errors->first('persona_departamento') }}
                          
                          {{ Form::label('fk_profesion', 'Profesión:') }}
                          {{ Form::select('fk_profesion', array($fk_profesion),$persona->profesion->id, array('class'=>'form-control')) }}
                          {{$errors->first('fk_profesion')}}
                          
                          {{ Form::label('fk_cargo', 'Cargo') }}
                          {{ Form::select('fk_cargo', array($fk_cargo), $persona->cargo->id, array('class'=>'form-control')) }}
                          {{$errors->first('fk_cargo')}}
                          
                          {{ Form::label('fk_lugar', 'Lugar de Procedencia:') }}
                          {{ Form::select('fk_lugar', array($fk_lugar), $persona->lugar->id,array('class'=> 'form-control')) }}
                          {{$errors->first('fk_lugar')}}

                          {{ Form::hidden('idedit', $persona->id) }}
                          
                          {{ Form::label('fk_persona_a_quien_autorizo', 'Persona Autorizada:') }}
                          @if($persona->fk_persona_a_quien_autorizo)
                          {{ Form::select('fk_persona_a_quien_autorizo', array('NULL' => 'No Aplica',$fk_persona_a_quien_autorizo), $persona->persona->id , array('class'=> 'form-control')) }}
                        @else
                          {{ Form::select('fk_persona_a_quien_autorizo', array('NULL' => 'No Aplica',$fk_persona_a_quien_autorizo), null, array('class'=> 'form-control')) }}
                        @endif
                          {{$errors->first('fk_persona_a_quien_autorizo')}}



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