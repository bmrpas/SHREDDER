<?php

class AccionController extends BaseController {

	public function get_accion(){
		return View::make('accion.createAccion');
	}

	public function add_accion(){
		$inputs = Input::all();

		$rules = array(
			'accion_nombre' => 'required|max:30|unique:accion,accion_nombre',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator); 
		}
		else{
			$accion = new Accion;
			$accion->accion_nombre = Input::get('accion_nombre');
			if ($accion->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('accion');
		}
	}

	public function mostrar_accion(){
		$acciones = Accion::orderBy('accion_nombre','ASC')->paginate(5);
		return View::make('accion.listaAccion', array('acciones' => $acciones));
	}

	public function editar_accion(){
		$inputs = Input::get('idedit');
		$accion = Accion::find($inputs);
		if($accion)
		return View::make('accion.createAccion')->with('accion',$accion);
	else
		return Redirect::to('accion');
	}

	public function update_accion(){
		$inputs = Input::all();

		$rules = array(
			'accion_nombre' => 'required|max:30|unique:accion,accion_nombre',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$accion = Accion::find($id);
			$accion->accion_nombre = Input::get('accion_nombre');

		if ($accion->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('accion');

		}	
	}

	public function borrar_accion(){
		$id = Input::get('idedit');
		$accion = Accion::find($id);

		if ($accion->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('accion');

	}

}