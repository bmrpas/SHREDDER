<?php

Class AreaInteresController Extends BaseController {

	public function get_area(){
		return View::make('area_interes.createArea');
	}

	public function add_area(){
		$inputs = Input::all();

		$rules = array(
			'area_interes_nombre' => 'required|max:50|unique:area_interes,area_interes_nombre',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator); 
		}
		else{
			$area = new Area_Interes;
			$area->area_interes_nombre = Input::get('area_interes_nombre');
			if ($area->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('area_interes');
		}
	}

	public function mostrar_area(){
		$areas = Area_Interes::orderBy('area_interes_nombre','ASC')->paginate(5);
		return View::make('area_interes.listaArea', array('areas' => $areas));
	}

	public function editar_area(){
		$inputs = Input::get('idedit');
		$area = Area_Interes::find($inputs);
		if($area)
		return View::make('area_interes.createArea')->with('area',$area);
	else
		return Redirect::to('area_interes');
	}

	public function update_area(){
		$inputs = Input::all();
		

		$rules = array(
			'area_interes_nombre' => 'required|max:50|unique:area_interes,area_interes_nombre',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$area = Area_Interes::find($id);
			$area->area_interes_nombre = Input::get('area_interes_nombre');

		if ($area->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('area_interes');

		}	
	}

	public function borrar_area(){
		$id = Input::get('idedit');
		$area = Area_Interes::find($id);

		if ($area->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('area_interes');

	}

}