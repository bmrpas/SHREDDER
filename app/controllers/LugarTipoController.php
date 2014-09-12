<?php

Class LugarTipoController Extends BaseController {

	public function get_lugar(){
		return View::make('lugar_tipo.createLugar');
	}

	public function add_lugar(){
		$inputs = Input::all();

		$rules = array(
			'lugar_tipo_nombre' => 'required|max:50|unique:lugar_tipo,lugar_tipo_nombre',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator); 
		}
		else{
			$tipo = new Lugar_Tipo;
			$tipo->lugar_tipo_nombre = Input::get('lugar_tipo_nombre');
			if ($tipo->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('lugar_tipo');
		}
	}

	public function mostrar_lugar(){
		$tipos = Lugar_Tipo::orderBy('lugar_tipo_nombre','ASC')->paginate(5);
		return View::make('lugar_tipo.listaLugar', array('tipos' => $tipos));
	}

	public function editar_lugar(){
		$inputs = Input::get('idedit');
		$tipo = Lugar_Tipo::find($inputs);
		if($tipo)
		return View::make('lugar_tipo.createLugar')->with('tipo',$tipo);
	else
		return Redirect::to('lugar_tipo');
	}

	public function update_lugar(){
		$inputs = Input::all();
		

		$rules = array(
			'lugar_tipo_nombre' => 'required|max:50|unique:lugar_tipo,lugar_tipo_nombre',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$tipo = Lugar_Tipo::find($id);
			$tipo->lugar_tipo_nombre = Input::get('lugar_tipo_nombre');

		if ($tipo->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('lugar_tipo');

		}	
	}

	public function borrar_lugar(){
		$id = Input::get('idedit');
		$tipo = Lugar_Tipo::find($id);

		if ($tipo->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('area_interes');

	}

}