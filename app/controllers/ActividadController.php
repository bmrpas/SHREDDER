<?php

class ActividadController extends BaseController {

	public function get_actividad(){
		return View::make('actividad.createActividad');
	}

	public function add_actividad(){
		$inputs = Input::all();

		$rules = array(
			'actividad_nombre' => 'required|max:50|unique:actividad,actividad_nombre',
			'actividad_descripcion' => 'required|max:200',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$actividad = new Actividad;
			$actividad->actividad_nombre = Input::get('actividad_nombre');
			$actividad->actividad_descripcion = Input::get('actividad_descripcion');
			
			if ($actividad->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('actividad');
		}
	}

	public function mostrar_actividad(){
		$actividades = Actividad::orderBy('actividad_nombre')->paginate(4);
		return View::make('actividad.listaActividad', array('actividades' => $actividades));
	}

	public function editar_actividad(){
		$inputs = Input::get('idedit');
		$actividad = Actividad::find($inputs);
		if($actividad)
		return View::make('actividad.createActividad',array('actividad' => $actividad));
	else
		return Redirect::to('actividad');
	}

	public function update_actividad(){
		$inputs = Input::all();
		$id = Input::get('idedit');
		$actividad = Actividad::find($id);

		if($actividad){
		$rules = array(
			'actividad_nombre' => 'required|max:50|unique:actividad,actividad_nombre,'.$actividad->id,
			'actividad_descripcion' => 'required|max:200',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			
			$actividad->actividad_nombre = Input::get('actividad_nombre');
			$actividad->actividad_descripcion = Input::get('actividad_descripcion');
			
			if ($actividad->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('actividad');

		}
			}else{
				return Redirect::to('actividad');
			}	
	}

	public function borrar_actividad(){
		$id = Input::get('idedit');
		$actividad = Actividad::find($id);

		if ($actividad->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('actividad');

	}

}