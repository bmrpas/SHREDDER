<?php

class EmpresaController extends BaseController {

	public function get_empresa(){
		$fk_lugar = Place::lists('lugar_nombre', 'id');
		return View::make('empresa.createEmpresa',array('fk_lugar'=>$fk_lugar));
	}

	public function add_empresa(){
		$inputs = Input::all();

		$rules = array(
			'empresa_rif' => 'required|max:50|unique:empresa,empresa_rif',
			'empresa_nombre' => 'required|max:100',
			'empresa_siglas' => 'required|max:10',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$empresa = new Empresa;
			$empresa->empresa_rif = Input::get('empresa_rif');
			$empresa->empresa_nombre = Input::get('empresa_nombre');
			$empresa->empresa_siglas = Input::get('empresa_siglas');
			$empresa->empresa_tipo_institucion = Input::get('empresa_tipo_institucion');
			$empresa->fk_lugar = Input::get('fk_lugar');
			
			if ($empresa->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('empresa');
		}
	}

	public function mostrar_empresa(){
		$empresas = Empresa::orderBy('empresa_nombre')->paginate(4);
		return View::make('empresa.listaEmpresa', array('empresas' => $empresas));
	}

	public function editar_empresa(){
		$inputs = Input::get('idedit');
		$fk_lugar = Place::lists('lugar_nombre', 'id');
		$empresa = Empresa::find($inputs);
		if($empresa)
		return View::make('empresa.createEmpresa',array('empresa' => $empresa, 'fk_lugar' => $fk_lugar));
	else
		return Redirect::to('empresa');
	}

	public function update_empresa(){
		$inputs = Input::all();
		$id = Input::get('idedit');
		$empresa = Empresa::find($id);

		if($empresa){
		$rules = array(
			'empresa_rif' => 'required|max:50|unique:empresa,empresa_rif,'.$empresa->id,
			'empresa_nombre' => 'required|max:100',
			'empresa_siglas' => 'required|max:10',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			
			$empresa->empresa_rif = Input::get('empresa_rif');
			$empresa->empresa_nombre = Input::get('empresa_nombre');
			$empresa->empresa_siglas = Input::get('empresa_siglas');
			$empresa->empresa_tipo_institucion = Input::get('empresa_tipo_institucion');
			$empresa->fk_lugar = Input::get('fk_lugar');
			
			if ($empresa->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('empresa');

		}
			}else{
				return Redirect::to('empresa');
			}	
	}

	public function borrar_empresa(){
		$id = Input::get('idedit');
		$empresa = Empresa::find($id);

		if ($empresa->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('empresa');

	}

}