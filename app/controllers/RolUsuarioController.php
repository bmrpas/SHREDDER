<?php

class RolUsuarioController extends BaseController {

	public function get_rol_usuario(){
		$fk_usuario = Usuario::get()->lists('usuario_login','id');
		$fk_rol = Rol::get()->lists('rol_nombre','id');	

		return View::make('rol_usuario.createRolUsuario',array('fk_usuario'=>$fk_usuario,'fk_rol'=>$fk_rol));
	}

	public function add_rol_usuario(){
		$inputs = Input::all();

			$rol_usuario = new Rol_Usuario;
			$rol_usuario->pk_fk_rol = Input::get('fk_rol');
			$rol_usuario->pk_fk_usuario = Input::get('fk_usuario');
			$rol_usuario->save();
			
			return Redirect::to('rol_usuario');
	}

	public function mostrar_rol_usuario(){
		$rol_usuario = Rol_Usuario::orderBy('pk_fk_rol')->paginate(10);
		//$solicitudes_empresa = Solicitud_Afiliacion::where('pk_fk_persona','=',null)->orderBy('solicitud_fecha')->paginate(10);
		return View::make('rol_usuario.listaRolUsuario', array('rol_usuario' => $rol_usuario));
	}

	public function editar_rol_usuario(){
		$fk_usuario = Usuario::get()->lists('usuario_login','id');
		$fk_rol = Rol::get()->lists('rol_nombre','id');	
		$inputs = Input::get('idedit');
		$rol_usuario = Rol_Usuario::find($inputs);
		if($rol_usuario)
		return View::make('rol_usuario.createRolUsuario',array('fk_usuario'=>$fk_usuario, 'fk_rol'=>$fk_rol, 'rol_usuario'=>$rol_usuario));
	else
		return Redirect::to('rol_usuario');
	}

	public function update_rol_usuario(){
			$id = Input::get('idedit');
			$rol_usuario = Rol_Usuario::find($id);
			$rol_usuario->pk_fk_rol = Input::get('fk_rol');
			$rol_usuario->pk_fk_usuario = Input::get('fk_usuario');
			$rol_usuario->save();
			
			return Redirect::to('rol_usuario');	
	}

	public function borrar_rol_usuario(){
		$id = Input::get('idedit');
		$rol_usuario = Rol_Usuario::find($id);

		if ($rol_usuario->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('rol_usuario');

	}

}