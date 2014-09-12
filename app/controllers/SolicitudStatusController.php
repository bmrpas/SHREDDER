<?php

class SolicitudStatusController extends BaseController {

	public function get_status(){
		$pk_fk_status = Status::orderBy('status_nombre','ASC')->get()->lists('status_nombre','id');	
		$fk_solicitud_personas = Solicitud_Informacion::where('pk_fk_empresa_persona','=',NULL)->paginate(10);
		$fk_solicitud_empresas = Solicitud_Informacion::where('pk_fk_persona','=',NULL)->paginate(10);
		return View::make('solicitud_status.createSolicitudStatus',array('pk_fk_status'=>$pk_fk_status,'fk_solicitud_personas'=>$fk_solicitud_personas, 'fk_solicitud_empresas'=>$fk_solicitud_empresas));
	}

	public function add_status(){
		$inputs = Input::all();
		$today = Carbon::today()->toDateString();	

			$solicitud_status = new Status_Solicitud;
			$solicitud_status->solicitud_status_fecha = $today;
			$solicitud_status->pk_fk_status = Input::get('pk_fk_status');

			if(Input::get('solicitud_persona') != null)
				$solicitud_status->pk_fk_solicitud_informacion = Input::get('solicitud_persona');
			else
				$solicitud_status->pk_fk_solicitud_informacion = Input::get('solicitud_empresa');
			
			$solicitud_status->save();

			return Redirect::to('status_solicitud');
	}

	public function mostrar_status(){
		$solicitud_status = Status_Solicitud::orderBy('solicitud_status_fecha')->orderBy('pk_fk_solicitud_informacion')->paginate(10);

		return View::make('solicitud_status.listaSolicitudStatus', array('solicitud_status' => $solicitud_status));
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