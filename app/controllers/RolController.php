<?php

class RolController extends BaseController {

	public function get_rol(){
		return View::make('rol.createRol');
	}

	public function add_rol(){
		$inputs = Input::all();

		$rules = array(
			'rol_nombre' => 'required|max:30|unique:rol,rol_nombre',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$rol = new Rol;
			$rol->rol_nombre = Input::get('rol_nombre');
			
			if ($rol->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('rol');
		}
	}

	public function mostrar_rol(){
		$roles = Rol::orderBy('rol_nombre')->paginate(4);
		return View::make('rol.listaRol', array('roles' => $roles));
	}

	public function editar_rol(){
		$inputs = Input::get('idedit');
		$rol = Rol::find($inputs);
		if($rol)
		return View::make('rol.createRol',array('rol' => $rol));
	else
		return Redirect::to('rol');
	}

	public function update_rol(){
		$inputs = Input::all();
		$id = Input::get('idedit');
		$rol = Rol::find($id);

		$rules = array(
			'rol_nombre' => 'required|max:30|unique:rol,rol_nombre,'.$rol->id,
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			
			$rol->rol_nombre = Input::get('rol_nombre');
			
			if ($rol->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('rol');

		}	
	}

	public function borrar_rol(){
		$id = Input::get('idedit');
		$rol = Rol::find($id);

		if ($rol->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('rol');

	}

}