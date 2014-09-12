<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'WebController@index');

Route::get('profesion', 'ProfesionController@mostrar_profesiones');
Route::get('profesion/crear', 'ProfesionController@get_profesion');
Route::post('profesion/crear','ProfesionController@add_profesion');
Route::get('profesion/editar', 'ProfesionController@editar_profesion');
Route::post('profesion/editar', 'ProfesionController@update_profesion');
Route::post('profesion/eliminar', 'ProfesionController@borrar_profesion');

Route::get('status', 'StatusController@mostrar_status');
Route::get('status/crear','StatusController@get_status');
Route::post('status/crear','StatusController@add_status');
Route::get('status/editar','StatusController@editar_status');
Route::post('status/editar','StatusController@update_Status');
Route::post('status/eliminar','StatusController@borrar_status');

Route::get('status_solicitud', 'SolicitudStatusController@mostrar_status');
Route::get('status_solicitud/crear','SolicitudStatusController@get_status');
Route::post('status_solicitud/crear','SolicitudStatusController@add_status');
Route::get('status_solicitud/editar','SolicitudStatusController@editar_status');
Route::post('status_solicitud/editar','SolicitudStatusController@update_Status');
Route::post('status_solicitud/eliminar','SolicitudStatusController@borrar_status');

Route::get('cargo','CargoController@mostrar_cargo');
Route::get('cargo/crear','CargoController@get_cargo');
Route::post('cargo/crear','CargoController@add_cargo');
Route::get('cargo/editar','CargoController@editar_cargo');
Route::post('cargo/editar','CargoController@update_cargo');
Route::post('cargo/eliminar','CargoController@borrar_Cargo');

Route::get('area_interes','AreaInteresController@mostrar_area');
Route::get('area_interes/crear','AreaInteresController@get_area');
Route::post('area_interes/crear','AreaInteresController@add_area');
Route::get('area_interes/editar','AreaInteresController@editar_area');
Route::post('area_interes/editar','AreaInteresController@update_area');
Route::post('area_interes/eliminar','AreaInteresController@borrar_area');

Route::get('lugar_tipo','LugarTipoController@mostrar_lugar');
Route::get('lugar_tipo/crear','LugarTipoController@get_lugar');
Route::post('lugar_tipo/crear','LugarTipoController@add_lugar');
Route::get('lugar_tipo/editar','LugarTipoController@editar_lugar');
Route::post('lugar_tipo/editar','LugarTipoController@update_lugar');
Route::post('lugar_tipo/eliminar','LugarTipoController@borrar_lugar');

Route::get('lugar','LugarController@mostrar_lugar');
Route::get('lugar/crear','LugarController@get_lugar');
Route::post('lugar/crear','LugarController@add_lugar');
Route::get('lugar/editar','LugarController@editar_lugar');
Route::post('lugar/editar','LugarController@update_lugar');
Route::post('lugar/eliminar','LugarController@borrar_lugar');

Route::get('accion','AccionController@mostrar_accion');
Route::get('accion/crear','AccionController@get_accion');
Route::post('accion/crear','AccionController@add_accion');
Route::get('accion/editar','AccionController@editar_accion');
Route::post('accion/editar','AccionController@update_accion');
Route::post('accion/eliminar','AccionController@borrar_accion');

Route::get('forma_busqueda','FormaBusquedaController@mostrar_forma');
Route::get('forma_busqueda/crear','FormaBusquedaController@get_forma');
Route::post('forma_busqueda/crear','FormaBusquedaController@add_forma');
Route::get('forma_busqueda/editar','FormaBusquedaController@editar_forma');
Route::post('forma_busqueda/editar','FormaBusquedaController@update_forma');
Route::post('forma_busqueda/eliminar','FormaBusquedaController@borrar_forma');

Route::get('persona','PersonaController@mostrar_persona');
Route::get('persona/crear','PersonaController@get_persona');
Route::post('persona/crear','PersonaController@add_persona');
Route::get('persona/editar','PersonaController@editar_persona');
Route::post('persona/editar','PersonaController@update_persona');
Route::post('persona/eliminar','PersonaController@borrar_persona');

Route::get('usuario','UsuarioController@mostrar_usuario');
Route::get('usuario/crear','UsuarioController@get_usuario');
Route::post('usuario/crear','UsuarioController@add_usuario');
Route::get('usuario/editar','UsuarioController@editar_usuario');
Route::post('usuario/editar','UsuarioController@update_usuario');
Route::post('usuario/eliminar','UsuarioController@borrar_usuario');

Route::get('rol','RolController@mostrar_rol');
Route::get('rol/crear','RolController@get_rol');
Route::post('rol/crear','RolController@add_rol');
Route::get('rol/editar','RolController@editar_rol');
Route::post('rol/editar','RolController@update_rol');
Route::post('rol/eliminar','RolController@borrar_rol');

Route::get('empresa','EmpresaController@mostrar_empresa');
Route::get('empresa/crear','EmpresaController@get_empresa');
Route::post('empresa/crear','EmpresaController@add_empresa');
Route::get('empresa/editar','EmpresaController@editar_empresa');
Route::post('empresa/editar','EmpresaController@update_empresa');
Route::post('empresa/eliminar','EmpresaController@borrar_empresa');

Route::get('actividad','ActividadController@mostrar_actividad');
Route::get('actividad/crear','ActividadController@get_actividad');
Route::post('actividad/crear','ActividadController@add_actividad');
Route::get('actividad/editar','ActividadController@editar_actividad');
Route::post('actividad/editar','ActividadController@update_actividad');
Route::post('actividad/eliminar','ActividadController@borrar_actividad');

Route::get('solicitud_info','SolicitudInformacionController@mostrar_solicitud_info');
Route::get('solicitud_info/crear','SolicitudInformacionController@get_solicitud_info');
Route::post('solicitud_info/crear','SolicitudInformacionController@add_solicitud_info');
Route::get('solicitud_info/editar','SolicitudInformacionController@editar_solicitud_info');
Route::post('solicitud_info/editar','SolicitudInformacionController@update_solicitud_info');
Route::post('solicitud_info/eliminar','SolicitudInformacionController@borrar_solicitud_info');

Route::get('solicitud_afiliacion','SolicitudAfiliacionController@mostrar_solicitud_afi');
Route::get('solicitud_afiliacion/crear','SolicitudAfiliacionController@get_solicitud_afi');
Route::post('solicitud_afiliacion/crear','SolicitudAfiliacionController@add_solicitud_afi');
Route::get('solicitud_afiliacion/editar','SolicitudAfiliacionController@editar_solicitud_afi');
Route::post('solicitud_afiliacion/editar','SolicitudAfiliacionController@update_solicitud_afi');
Route::post('solicitud_afiliacion/eliminar','SolicitudAfiliacionController@borrar_solicitud_afi');

Route::get('empresa_persona','EmpresaPersonaController@mostrar_empresa_persona');
Route::get('empresa_persona/crear','EmpresaPersonaController@get_empresa_persona');
Route::post('empresa_persona/crear','EmpresaPersonaController@add_empresa_persona');
Route::get('empresa_persona/editar','EmpresaPersonaController@editar_empresa_persona');
Route::post('empresa_persona/editar','EmpresaPersonaController@update_empresa_persona');
Route::post('empresa_persona/eliminar','EmpresaPersonaController@borrar_empresa_persona');

Route::get('rol_usuario','RolUsuarioController@mostrar_rol_usuario');
Route::get('rol_usuario/crear','RolUsuarioController@get_rol_usuario');
Route::post('rol_usuario/crear','RolUsuarioController@add_rol_usuario');
Route::get('rol_usuario/editar','RolUsuarioController@editar_rol_usuario');
Route::post('rol_usuario/editar','RolUsuarioController@update_rol_usuario');
Route::post('rol_usuario/eliminar','RolUsuarioController@borrar_rol_usuario');

Route::get('rol_accion','RolAccionController@mostrar_rol_accion');
Route::get('rol_accion/crear','RolAccionController@get_rol_accion');
Route::post('rol_accion/crear','RolAccionController@add_rol_accion');
Route::get('rol_accion/editar','RolAccionController@editar_rol_accion');
Route::post('rol_accion/editar','RolAccionController@update_rol_accion');
Route::post('rol_accion/eliminar','RolAccionController@borrar_rol_accion');

Route::get('empresa_actividad','EmpresaActividadController@mostrar_empresa_actividad');
Route::get('empresa_actividad/crear','EmpresaActividadController@get_empresa_actividad');
Route::post('empresa_actividad/crear','EmpresaActividadController@add_empresa_actividad');
Route::get('empresa_actividad/editar','EmpresaActividadController@editar_empresa_actividad');
Route::post('empresa_actividad/editar','EmpresaActividadController@update_empresa_actividad');
Route::post('empresa_actividad/eliminar','EmpresaActividadController@borrar_empresa_actividad');

Route::get('persona_area','PersonaAreaController@mostrar_persona_area');
Route::get('persona_area/crear','PersonaAreaController@get_persona_area');
Route::post('persona_area/crear','PersonaAreaController@add_persona_area');
Route::get('persona_area/editar','PersonaAreaController@editar_persona_area');
Route::post('persona_area/editar','PersonaAreaController@update_persona_area');
Route::post('persona_area/eliminar','PersonaAreaController@borrar_persona_area');

Route::get('telefono','TelefonoController@mostrar_telefono');
Route::get('telefono/crear','TelefonoController@get_telefono');
Route::post('telefono/crear','TelefonoController@add_telefono');
Route::get('telefono/editar','TelefonoController@editar_telefono');
Route::post('telefono/editar','TelefonoController@update_telefono');
Route::post('telefono/eliminar','TelefonoController@borrar_telefono');