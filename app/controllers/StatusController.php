<?php

class StatusController extends BaseController {

	public function get_status(){
		return View::make('status.createStatus');
	}

	public function add_status(){
		$inputs = Input::all();

		$rules = array(
			'status_nombre' => 'required|max:20|unique:status,status_nombre',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator); 
		}
		else{
			$status = new Status;
			$status->status_nombre = Input::get('status_nombre');
			if ($status->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('status');
		}
	}

	public function mostrar_status(){
		$statues = Status::orderBy('status_nombre','ASC')->paginate(5);
		return View::make('status.listaStatus', array('statues' => $statues));
	}

	public function editar_status(){
		$inputs = Input::get('idedit');
		$status = Status::find($inputs);
		return View::make('status.createStatus')->with('status',$status);
	}

	public function update_status(){
		$inputs = Input::all();
		

		$rules = array(
			'status_nombre' => 'required|max:20|unique:status,status_nombre',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$status = Status::find($id);
			$status->status_nombre = Input::get('status_nombre');

		if ($status->save()) {
			return Redirect::to('status')->with('notice','Status modificado correctamente');
		} else {
			return Redirect::to('status')->with('notice','Ha ocurrido un error, intentelo nuevamente');
		}	
	}
}

	public function borrar_status(){
		$id = Input::get('idedit');
		$status = Status::find($id);

		if ($status->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('status');

	}

}