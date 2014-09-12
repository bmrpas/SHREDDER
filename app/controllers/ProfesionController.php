<?php

class ProfesionController extends BaseController {

	public function get_profesion(){
		return View::make('profesion.createProfesion');
	}

	public function add_profesion(){
		$inputs = Input::all();

		$rules = array(
			'profesion_nombre' => 'required|max:50|unique:profesion,profesion_nombre',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator); 
		}
		else{
			$profesion = new Profesion;
			$profesion->profesion_nombre = Input::get('profesion_nombre');
			if ($profesion->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('/profesion');
		}
	}

	public function mostrar_profesiones(){
		$profesiones = Profesion::orderBy('profesion_nombre','ASC')->paginate(5);
		return View::make('profesion.listaProfesion', array('profesiones' => $profesiones));
	}

	public function editar_profesion(){
		$inputs = Input::get('idedit');
		$profesion = Profesion::find($inputs);
		return View::make('profesion.createProfesion')->with('profesion',$profesion);
	}

	public function update_profesion(){
		$inputs = Input::all();
		

		$rules = array(
			'profesion_nombre' => 'required|max:50|unique:profesion,profesion_nombre',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$profesion = Profesion::find($id);
			$profesion->profesion_nombre = Input::get('profesion_nombre');

		if ($profesion->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('profesion');

		}	
	}

	public function borrar_profesion(){
		$id = Input::get('idedit');
		$profesion = Profesion::find($id);

		if ($profesion->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('profesion');

	}

}