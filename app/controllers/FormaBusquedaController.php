<?php

class FormaBusquedaController extends BaseController {

	public function get_forma(){
		return View::make('forma_busqueda.createFormaBusqueda');
	}

	public function add_forma(){
		$inputs = Input::all();

		$rules = array(
			'forma_busqueda' => 'required|max:15:forma_busqueda,forma_busqueda_palabra',
			'forma_busqueda_tipo' => 'required|max:30:forma_busqueda,forma_busqueda_tipo',
			);
		$validator = Validator::make($inputs, $rules);
		$forma_temp = DB::table('forma_busqueda')->where('forma_busqueda_palabra', Input::get('forma_busqueda'))->where('forma_busqueda_tipo',Input::get('forma_busqueda_tipo'))->first();
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}elseif($forma_temp){
			return Redirect::back()->with('message','Combinación de palabras ya existente');
		}
		else{
			$forma = new Forma_Busqueda;
			$forma->forma_busqueda_palabra = Input::get('forma_busqueda');
			$forma->forma_busqueda_tipo = Input::get('forma_busqueda_tipo');
			if ($forma->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('forma_busqueda');
		}
	}

	public function mostrar_forma(){
		$formas = Forma_Busqueda::orderBy('forma_busqueda_tipo')->paginate(10);
		return View::make('forma_busqueda.listaFormaBusqueda', array('formas' => $formas));
	}

	public function editar_forma(){
		$inputs = Input::get('idedit');
		$forma = Forma_Busqueda::find($inputs);
		if($forma)
		return View::make('forma_busqueda.createFormaBusqueda')->with('forma',$forma);
	else
		return Redirect::to('forma');
	}

	public function update_forma(){
		$inputs = Input::all();

		$rules = array(
			'forma_busqueda' => 'required|max:15:forma_busqueda,forma_busqueda_palabra',
			'forma_busqueda_tipo' => 'required|max:30:forma_busqueda,forma_busqueda_tipo',
			);
		$validator = Validator::make($inputs,$rules);
		$forma_temp = DB::table('forma_busqueda')->where('forma_busqueda_palabra', Input::get('forma_busqueda'))->where('forma_busqueda_tipo',Input::get('forma_busqueda_tipo'))->first();

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}elseif($forma_temp){
			return Redirect::back()->with('message','Combinación de palabras ya existente');
		}
		else{
			$id = Input::get('idedit');
			$forma = Forma_Busqueda::find($id);
			$forma->forma_busqueda_palabra = Input::get('forma_busqueda');
			$forma->forma_busqueda_tipo = Input::get('forma_busqueda_tipo');

		if ($forma->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('forma_busqueda');

		}	
	}

	public function borrar_forma(){
		$id = Input::get('idedit');
		$forma = Forma_Busqueda::find($id);

		if ($forma->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('forma_busqueda');

	}

}