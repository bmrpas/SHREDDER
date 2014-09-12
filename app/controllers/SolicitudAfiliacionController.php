<?php

class SolicitudAfiliacionController extends BaseController {

	public function get_solicitud_afi(){
		$fk_empresa_persona = Empresa_Persona::get()->lists('full_name','id');
		$fk_persona = Person::where('persona_es_autorizado','=',FALSE)->orderBy('persona_cid','ASC')->get()->lists('full_name','id');	
		$today = Carbon::today()->toDateString();	

		return View::make('solicitud_afiliacion.createSolicitudAfi',array('fk_empresa_persona'=>$fk_empresa_persona,'fk_persona'=>$fk_persona,'today'=>$today));
	}

	public function add_solicitud_afi(){
		$inputs = Input::all();

		$rules = array(
			'solicitud_direccion_exacta' => 'required|max:150:solicitud_afiliacion,solicitud_direccion_exacta',
			//'solicitud_fecha' => 'required:solicitud_afiliacion,solicitud_fecha',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$solicitud_afiliacion = new Solicitud_Afiliacion;
			$solicitud_afiliacion->solicitud_direccion_exacta = Input::get('solicitud_direccion_exacta');
			$today = Carbon::today()->toDateString();	
			$solicitud_afiliacion->solicitud_fecha = $today;
			if(Input::get('fk_persona') != 'NULL'){
				$solicitud_afiliacion->pk_fk_persona = Input::get('fk_persona');
				$solicitud_afiliacion->pk_fk_empresa_persona = NULL;
				$solicitud_afiliacion->save();
				return Redirect::to('solicitud_afiliacion');

			}else{
				$solicitud_afiliacion->pk_fk_empresa_persona = Input::get('fk_empresa_persona');
				$solicitud_afiliacion->pk_fk_persona = NULL;
				$solicitud_afiliacion->save();
				return Redirect::to('solicitud_afiliacion');
			}
			
			return Redirect::to('solicitud_afiliacion');
		}
	}

	public function mostrar_solicitud_afi(){
		$solicitudes = Solicitud_Afiliacion::where('pk_fk_empresa_persona','=',null)->orderBy('solicitud_fecha')->paginate(10);
		$solicitudes_empresa = Solicitud_Afiliacion::where('pk_fk_persona','=',null)->orderBy('solicitud_fecha')->paginate(10);
		return View::make('solicitud_afiliacion.listaSolicitudAfi', array('solicitudes' => $solicitudes,'solicitudes_empresa'=>$solicitudes_empresa));
	}

	public function editar_solicitud_afi(){
		$fk_empresa_persona = Empresa_Persona::get()->lists('full_name', 'id');
		$fk_persona = Person::where('persona_es_autorizado','=',FALSE)->orderBy('persona_cid','ASC')->get()->lists('full_name','id');	
		$today = Carbon::today()->toDateString();	
		$inputs = Input::get('idedit');
		$solicitud_afiliacion = Solicitud_Afiliacion::find($inputs);
		//$fk_empresa_persona_seleccionada = Person::where('persona_cid','!=',$persona->persona_cid)->where('persona_es_autorizado','=',false)->lists('persona_cid', 'id');
		if($solicitud_afiliacion)
		return View::make('solicitud_afiliacion.createSolicitudAfi',array('fk_empresa_persona'=>$fk_empresa_persona, 'fk_persona'=>$fk_persona, 'solicitud_afiliacion'=>$solicitud_afiliacion));
	else
		return Redirect::to('solicitud_afiliacion');
	}

	public function update_solicitud_afi(){
		$inputs = Input::all();

		$rules = array(
			'solicitud_direccion_exacta' => 'required|max:150:solicitud_afiliacion,solicitud_direccion_exacta',
			//'solicitud_fecha' => 'required:solicitud_afiliacion,solicitud_fecha',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$id = Input::get('idedit');
			$solicitud_afiliacion = Solicitud_Afiliacion::find($id);
			$solicitud_afiliacion->solicitud_direccion_exacta = Input::get('solicitud_direccion_exacta');
			//$today = Carbon::today()->toDateString();	
			//$solicitud_afiliacion->solicitud_fecha = $today;
					if($solicitud_afiliacion->pk_fk_persona){
						$solicitud_afiliacion->pk_fk_persona = Input::get('fk_persona');
						$solicitud_afiliacion->pk_fk_empresa_persona = NULL;
						$solicitud_afiliacion->save();
						return Redirect::to('solicitud_afiliacion');

					}elseif($solicitud_afiliacion->pk_fk_empresa_persona){
						$solicitud_afiliacion->pk_fk_empresa_persona = Input::get('fk_empresa_persona');
						$solicitud_afiliacion->pk_fk_persona = NULL;
						$solicitud_afiliacion->save();
						return Redirect::to('solicitud_afiliacion');
					}
			
			return Redirect::to('solicitud_afiliacion');
		}	
	}

	public function borrar_solicitud_afi(){
		$id = Input::get('idedit');
		$solicitud = Solicitud_Afiliacion::find($id);

		if ($solicitud->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('solicitud_afiliacion');

	}

}