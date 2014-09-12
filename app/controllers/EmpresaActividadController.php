<?php

class EmpresaActividadController extends BaseController {

	public function get_empresa_actividad(){
		$fk_empresa = Empresa::get()->lists('empresa_nombre','id');
		$fk_actividad = Actividad::get()->lists('actividad_nombre','id');	

		return View::make('empresa_actividad.createEmpresaActividad',array('fk_empresa'=>$fk_empresa,'fk_actividad'=>$fk_actividad));
	}

	public function add_empresa_actividad(){
		$inputs = Input::all();

			$empresa_actividad = new Empresa_Actividad;
			$empresa_actividad->pk_fk_empresa = Input::get('fk_empresa');
			$empresa_actividad->pk_fk_actividad = Input::get('fk_actividad');
			$empresa_actividad->save();

			return Redirect::to('empresa_actividad');
	}

	public function mostrar_empresa_actividad(){
		$empresa_actividad = Empresa_Actividad::orderBy('pk_fk_actividad')->paginate(10);

		return View::make('empresa_actividad.listaEmpresaActividad', array('empresa_actividad' => $empresa_actividad));
	}

	public function editar_empresa_actividad(){
		$fk_empresa = Empresa::get()->lists('empresa_nombre','id');
		$fk_actividad = Actividad::get()->lists('actividad_nombre','id');	
		$inputs = Input::get('idedit');
		$empresa_actividad = Empresa_Actividad::find($inputs);
		if($empresa_actividad)
		return View::make('empresa_actividad.createEmpresaActividad',array('fk_empresa'=>$fk_empresa, 'fk_actividad'=>$fk_actividad, 'empresa_actividad'=>$empresa_actividad));
	else
		return Redirect::to('empresa_actividad');
	}

	public function update_empresa_actividad(){
			$id = Input::get('idedit');
			$empresa_actividad = Empresa_Actividad::find($id);
			$empresa_actividad->pk_fk_empresa = Input::get('fk_empresa');
			$empresa_actividad->pk_fk_actividad = Input::get('fk_actividad');
			$empresa_actividad->save();
			
			return Redirect::to('empresa_actividad');	
	}

	public function borrar_empresa_actividad(){
		$id = Input::get('idedit');
		$empresa_actividad = Empresa_Actividad::find($id);

		if ($empresa_actividad->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('empresa_actividad');

	}

}