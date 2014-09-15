@extends('layouts.master')
@section('index')
          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." bla bla</p>


          <!--div class="row">
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

          </div-->
            <div class="col-md-6">
            
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Título</th>
                      <th>Descripcion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ HTML::link('profesion', 'Profesión')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('cargo', 'Cargo')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('status', 'Status')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('status_solicitud', 'Status de las Solicitudes')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('area_interes', 'Área de Interés')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('lugar_tipo', 'Tipos de Lugar')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('lugar', 'Lugares')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('accion', 'Acciones')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('forma_busqueda', 'Formas de Busqueda')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('persona', 'Personas')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('usuario', 'Usuarios')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                   
                  </tbody>
                </table>
            </div> 

             <div class="col-md-6">
            
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Título</th>
                      <th>Descripcion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ HTML::link('rol', 'Roles')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('empresa', 'Empresas')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('actividad', 'Actividades')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('solicitud_afiliacion', 'Solicitudes de Afiliación')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('solicitud_info', 'Solicitudes de Información')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('empresa_persona', 'Representantes de Empresa')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('rol_usuario', 'Usuarios con sus Roles')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('rol_accion', 'Roles con sus Acciones')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('empresa_actividad', 'Empresas con sus Actividades')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('persona_area', 'Personas con sus Áreas de Interés')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link('telefono', 'Teléfonos')}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                    <tr>
                      <td>{{ HTML::link($sitios->sitio_nombre, $sitios->sitio_nombre)}}</td>
                      <td>ipsum dolor sit amet, consectetur </td>
                    </tr>
                   
                  </tbody>
                </table>
            </div> 
@stop

