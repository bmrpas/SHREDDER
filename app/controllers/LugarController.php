<?php

class LugarController extends BaseController {

	public function get_lugar(){
		$fk_lugar = Place::lists('lugar_nombre', 'id');
		$fk_lugar_tipo = Lugar_Tipo::lists('lugar_tipo_nombre', 'id');
		return View::make('lugar.createLugar',array('fk_lugar' => $fk_lugar, 'fk_lugar_tipo' => $fk_lugar_tipo));
	}

	public function add_lugar(){
		$inputs = Input::all();

		$rules = array(
			'lugar_nombre' => 'required|max:50:lugar,lugar_nombre',
			'lugar_codigo_postal' => 'integer:lugar,lugar_codigo_postal',
			
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$lugar = new Place;
			$lugar->lugar_nombre = Input::get('lugar_nombre');
			if(Input::get('lugar_codigo_postal')){
				$lugar->lugar_codigo_postal = (Input::get('lugar_codigo_postal'));
			}else{
				$lugar->lugar_codigo_postal = NULL;
			}
			if(Input::get('fk_lugar') != 'NULL'){
				$lugar->fk_lugar = Input::get('fk_lugar');
			}else{
				$lugar->fk_lugar = NULL;
			}
			$lugar->fk_lugar_tipo = Input::get('fk_lugar_tipo');
			
			if ($lugar->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('lugar');
		}
	}

	public function mostrar_lugar(){
		$lugares = Place::orderBy('lugar_nombre')->paginate(10);
		return View::make('lugar.listaLugar', array('lugares' => $lugares));
	}

	public function editar_lugar(){
		$fk_lugar = Place::lists('lugar_nombre', 'id');
		$fk_lugar_tipo = Lugar_Tipo::lists('lugar_tipo_nombre', 'id');
		$inputs = Input::get('idedit');
		$lugar = Place::find($inputs);
		if($lugar)
		return View::make('lugar.createLugar',array('lugar' => $lugar, 'fk_lugar' => $fk_lugar, 'fk_lugar_tipo' => $fk_lugar_tipo));
	else
		return Redirect::to('lugar');
	}

	public function update_lugar(){
		$inputs = Input::all();

		$rules = array(
			'lugar_nombre' => 'required|max:50:lugar,lugar_nombre',
			'lugar_codigo_postal' => 'integer:lugar,lugar_codigo_postal',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$lugar = Place::find($id);
			$lugar->lugar_nombre = Input::get('lugar_nombre');
			if(Input::get('lugar_codigo_postal')){
				$lugar->lugar_codigo_postal = (Input::get('lugar_codigo_postal'));
			}else{
				$lugar->lugar_codigo_postal = NULL;
			}
			if(Input::get('fk_lugar') != 'NULL'){
				$lugar->fk_lugar = Input::get('fk_lugar');
			}else{
				$lugar->fk_lugar = NULL;
			}
			$lugar->fk_lugar_tipo = Input::get('fk_lugar_tipo');
			
			if ($lugar->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('lugar');

		}	
	}

	public function borrar_lugar(){
		$id = Input::get('idedit');
		$lugar = Place::find($id);

		if ($lugar->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('lugar');

	}

}