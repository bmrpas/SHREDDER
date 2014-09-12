@extends('layouts.master')
@section('index')
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla</p>


          <div class="row">
            <div class="col-md-4"> {{ HTML::link('profesion', 'Profesión')}}</div>
            <div class="col-md-4"> {{ HTML::link('cargo', 'Cargo')}}</div>
            <div class="col-md-4"> {{ HTML::link('status', 'Status')}}</div>
            <div class="col-md-4"> {{ HTML::link('status_solicitud', 'Status de las Solicitudes')}}</div>
            <div class="col-md-4"> {{ HTML::link('area_interes', 'Área de Interés')}}</div>
            <div class="col-md-4"> {{ HTML::link('lugar_tipo', 'Tipos de Lugar')}}</div>
            <div class="col-md-4"> {{ HTML::link('lugar', 'Lugares')}}</div>
            <div class="col-md-4"> {{ HTML::link('accion', 'Acciones')}}</div>
            <div class="col-md-4"> {{ HTML::link('forma_busqueda', 'Formas de Busqueda')}}</div>
            <div class="col-md-4"> {{ HTML::link('persona', 'Personas')}}</div>
            <div class="col-md-4"> {{ HTML::link('usuario', 'Usuarios')}}</div>
            <div class="col-md-4"> {{ HTML::link('rol', 'Roles')}}</div>
            <div class="col-md-4"> {{ HTML::link('empresa', 'Empresas')}}</div>
            <div class="col-md-4"> {{ HTML::link('actividad', 'Actividades')}}</div>
            <div class="col-md-4"> {{ HTML::link('solicitud_afiliacion', 'Solicitudes de Afiliación')}}</div>
            <div class="col-md-4"> {{ HTML::link('solicitud_info', 'Solicitudes de Información')}}</div>
            <div class="col-md-4"> {{ HTML::link('empresa_persona', 'Representantes de Empresa')}}</div>
            <div class="col-md-4"> {{ HTML::link('rol_usuario', 'Usuarios con sus Roles')}}</div>
            <div class="col-md-4"> {{ HTML::link('rol_accion', 'Roles con sus Acciones')}}</div>            
            <div class="col-md-4"> {{ HTML::link('empresa_actividad', 'Empresas con sus Actividades')}}</div>
            <div class="col-md-4"> {{ HTML::link('persona_area', 'Personas con sus Áreas de Interés')}}</div>
            <div class="col-md-4"> {{ HTML::link('telefono', 'Teléfonos')}}</div>

          </div>
@stop