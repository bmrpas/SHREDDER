<?php

class CargoController extends BaseController {

	public function get_cargo(){
		return View::make('cargo.createCargo');
	}

	public function add_cargo(){
		$inputs = Input::all();

		$rules = array(
			'cargo_nombre' => 'required|max:50|unique:cargo,cargo_nombre',
			'cargo_siglas' => 'required|max:10:cargo,cargo_siglas',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator); 
		}
		else{
			$cargo = new Cargo;
			$cargo->cargo_nombre = Input::get('cargo_nombre');
			$cargo->cargo_siglas = Input::get('cargo_siglas');
			if ($cargo->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('cargo');
		}
	}

	public function mostrar_cargo(){
		$cargos = Cargo::orderBy('cargo_nombre','ASC')->paginate(5);
		return View::make('cargo.listaCargo', array('cargos' => $cargos));
	}

	public function editar_cargo(){
		$inputs = Input::get('idedit');
		$cargo = Cargo::find($inputs);
		if($cargo)
		return View::make('cargo.createCargo')->with('cargo',$cargo);
	else
		return Redirect::to('cargo');
	}

	public function update_cargo(){
		$inputs = Input::all();
		

		$rules = array(
			'cargo_nombre' => 'required|max:50|unique:cargo,cargo_nombre',
			'cargo_siglas' => 'required|max:10:cargo,cargo_siglas',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$cargo = Cargo::find($id);
			$cargo->cargo_nombre = Input::get('cargo_nombre');
			$cargo->cargo_siglas = Input::get('cargo_siglas');

		if ($cargo->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('cargo');

		}	
	}

	public function borrar_cargo(){
		$id = Input::get('idedit');
		$cargo = Cargo::find($id);

		if ($cargo->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('cargo');

	}

}