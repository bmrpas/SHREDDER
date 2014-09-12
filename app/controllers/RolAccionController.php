<?php

class RolAccionController extends BaseController {

	public function get_rol_accion(){
		$fk_accion = Accion::get()->lists('accion_nombre','id');
		$fk_rol = Rol::get()->lists('rol_nombre','id');	

		return View::make('rol_accion.createRolAccion',array('fk_accion'=>$fk_accion,'fk_rol'=>$fk_rol));
	}

	public function add_rol_accion(){
		$inputs = Input::all();

			$rol_accion = new Rol_Accion;
			$rol_accion->fk_rol = Input::get('fk_rol');
			$rol_accion->fk_accion = Input::get('fk_accion');
			$rol_accion->save();

			return Redirect::to('rol_accion');
	}

	public function mostrar_rol_accion(){
		$rol_accion = Rol_Accion::orderBy('fk_accion')->paginate(10);
		//$solicitudes_empresa = Solicitud_Afiliacion::where('pk_fk_persona','=',null)->orderBy('solicitud_fecha')->paginate(10);
		return View::make('rol_accion.listaRolAccion', array('rol_accion' => $rol_accion));
	}

	public function editar_rol_accion(){
		$fk_accion = Accion::get()->lists('accion_nombre','id');
		$fk_rol = Rol::get()->lists('rol_nombre','id');	
		$inputs = Input::get('idedit');
		$rol_accion = Rol_Accion::find($inputs);
		if($rol_accion)
		return View::make('rol_accion.createRolAccion',array('fk_accion'=>$fk_accion, 'fk_rol'=>$fk_rol, 'rol_accion'=>$rol_accion));
	else
		return Redirect::to('rol_accion');
	}

	public function update_rol_accion(){
			$id = Input::get('idedit');
			$rol_accion = Rol_Accion::find($id);
			$rol_accion->fk_rol = Input::get('fk_rol');
			$rol_accion->fk_accion = Input::get('fk_accion');
			$rol_accion->save();
			
			return Redirect::to('rol_accion');	
	}

	public function borrar_rol_accion(){
		$id = Input::get('idedit');
		$rol_accion = Rol_Accion::find($id);

		if ($rol_accion->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('rol_accion');

	}

}