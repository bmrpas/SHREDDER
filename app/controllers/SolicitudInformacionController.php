<?php

class SolicitudInformacionController extends BaseController {

	public function get_solicitud_info(){
		$fk_empresa_persona = Empresa_Persona::get()->lists('full_name','id');
		$fk_persona = Person::orderBy('persona_cid','ASC')->get()->lists('full_name','id');	
		$today = Carbon::today()->toDateString();
		$year = Carbon::today()->year;

		return View::make('solicitud_informacion.createSolicitudInfo',array('fk_empresa_persona'=>$fk_empresa_persona,'fk_persona'=>$fk_persona,'today'=>$today, 'year'=>$year));
	}

	public function add_solicitud_info(){
		$inputs = Input::all();

		$rules = array(
			'solicitud_info_cantidad_paginas' => 'required|integer',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
	
		}
		else{
			$solicitud_informacion = new Solicitud_Informacion;
			$today = Carbon::today()->toDateString();	
			$solicitud_informacion->solicitud_info_fecha = $today;
			$solicitud_informacion->solicitud_info_cantidad_paginas = Input::get('solicitud_info_cantidad_paginas');
			$solicitud_informacion->solicitud_info_modalidad_envio = Input::get('solicitud_info_modalidad_envio');
			
			if(Input::get('solicitud_info_urgente') == 'true')
				$solicitud_informacion->solicitud_info_urgente = TRUE;
			else
				$solicitud_informacion->solicitud_info_urgente = FALSE;
			
			$solicitud_informacion->solicitud_tipo = Input::get('solicitud_tipo');

			if ($solicitud_informacion->solicitud_tipo == 'REFERENCIA BIBLIOGRAFICA') {

				$rules_referencia = array(
					'referencia' => 'required|integer',
					'titulo_articulo' => 'required|max:150',
					'autor' => 'required|alpha|max:150',
					'titulo_publicacion' => 'required|max:150',
					'ano_publicacion' => 'required|integer',
					'volumen' => 'integer',
					'numero_publicacion' => 'integer',
					'pagina_inicio' => 'required|integer',
					'pagina_fin' => 'required|integer',


					);

				$validator_referencia = Validator::make($inputs,$rules_referencia);

				if($validator_referencia->fails()){
					return Redirect::back()->withInput()->withErrors($validator_referencia);
				}

				$solicitud_informacion->referencia = Input::get('referencia');

				if(Input::get('busqueda_fuente_nacional') == 'true')
					$solicitud_informacion->busqueda_fuente_nacional = TRUE;
				else
					$solicitud_informacion->busqueda_fuente_nacional = FALSE;

				if(Input::get('busqueda_fuente_internacional') == 'true')
					$solicitud_informacion->busqueda_fuente_internacional = TRUE;
				else
					$solicitud_informacion->busqueda_fuente_internacional = FALSE;
				
				$solicitud_informacion->titulo_articulo = Input::get('titulo_articulo');
				$solicitud_informacion->autor = Input::get('autor');
				$solicitud_informacion->titulo_publicacion = Input::get('titulo_publicacion');
				$solicitud_informacion->ano_publicacion = Input::get('ano_publicacion');

				if(Input::get('volumen'))
					$solicitud_informacion->volumen = Input::get('volumen');
				else
					$solicitud_informacion->volumen = NULL;

				if(Input::get('numero_publicacion'))
					$solicitud_informacion->numero_publicacion = Input::get('numero_publicacion');
				else
					$solicitud_informacion->numero_publicacion = NULL;

				$solicitud_informacion->pagina_inicio = Input::get('pagina_inicio');
				$solicitud_informacion->pagina_fin = Input::get('pagina_fin');

				$solicitud_informacion->nombre_base_datos = null;
				$solicitud_informacion->ano_inicio = null;
				$solicitud_informacion->ano_fin = null;
				$solicitud_informacion->idioma = null;
				$solicitud_informacion->comentario = null;
			} else{

				$rules_base_datos = array(
					'nombre_base_datos' => 'required|max:50',
					'ano_inicio' => 'required|integer',
					'ano_fin' => 'required|integer',
					'idioma' => 'required|alpha|max:10',
					'comentario' => 'max:150',

					);

				$validator_base_datos = Validator::make($inputs, $rules_base_datos);

				if($validator_base_datos->fails()){
					return Redirect::back()->withInput()->withErrors($validator_base_datos);
				}

				$solicitud_informacion->nombre_base_datos = Input::get('nombre_base_datos');
				$solicitud_informacion->ano_inicio = Input::get('ano_inicio');
				$solicitud_informacion->ano_fin = Input::get('ano_fin');
				$solicitud_informacion->idioma = Input::get('idioma');
				$solicitud_informacion->comentario = Input::get('comentario');

				$solicitud_informacion->referencia = null;
				$solicitud_informacion->busqueda_fuente_nacional = null;
				$solicitud_informacion->busqueda_fuente_internacional = null;
				$solicitud_informacion->titulo_articulo = null;
				$solicitud_informacion->autor = null;
				$solicitud_informacion->titulo_publicacion = null;
				$solicitud_informacion->ano_publicacion = null;
				$solicitud_informacion->volumen = null;
				$solicitud_informacion->numero_publicacion = null;
				$solicitud_informacion->pagina_inicio = null;
				$solicitud_informacion->pagina_fin = null;
			}

			if(Input::get('fk_persona') != 'NULL'){
				$solicitud_informacion->pk_fk_persona = Input::get('fk_persona');
				$solicitud_informacion->pk_fk_empresa_persona = NULL;
				$solicitud_informacion->save();
				return Redirect::to('solicitud_info');

			}else{
				$solicitud_informacion->pk_fk_empresa_persona = Input::get('fk_empresa_persona');
				$solicitud_informacion->pk_fk_persona = NULL;
				$solicitud_informacion->save();
				return Redirect::to('solicitud_info');
			}
			
			return Redirect::to('solicitud_info');
		}
	}

	public function mostrar_solicitud_info(){
		$solicitudes = Solicitud_Informacion::where('pk_fk_empresa_persona','=',null)->orderBy('solicitud_info_fecha')->paginate(10);
		$solicitudes_empresa = Solicitud_Informacion::where('pk_fk_persona','=',null)->orderBy('solicitud_info_fecha')->paginate(10);
		return View::make('solicitud_informacion.listaSolicitudInfo', array('solicitudes' => $solicitudes,'solicitudes_empresa'=>$solicitudes_empresa));
	}

	public function editar_solicitud_info(){
		$fk_empresa_persona = Empresa_Persona::get()->lists('full_name','id');
		$fk_persona = Person::orderBy('persona_cid','ASC')->get()->lists('full_name','id');	
		$today = Carbon::today()->toDateString();
		$year = Carbon::today()->year;	
		$inputs = Input::get('idedit');
		$solicitud_informacion = Solicitud_Informacion::find($inputs);
		if($solicitud_informacion)
		return View::make('solicitud_informacion.createSolicitudInfo',array('fk_empresa_persona'=>$fk_empresa_persona, 'fk_persona'=>$fk_persona, 'solicitud_informacion'=>$solicitud_informacion, 'today'=>$today, 'year'=>$year));
	else
		return Redirect::to('solicitud_info');
	}

	public function update_solicitud_info(){
		$inputs = Input::all();

				$rules = array(
			'solicitud_info_cantidad_paginas' => 'required|integer',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
	
		}
		else{
			$id = Input::get('idedit');
			$solicitud_informacion = Solicitud_Informacion::find($id);
			$solicitud_informacion->solicitud_info_cantidad_paginas = Input::get('solicitud_info_cantidad_paginas');
			$solicitud_informacion->solicitud_info_modalidad_envio = Input::get('solicitud_info_modalidad_envio');
			
			if(Input::get('solicitud_info_urgente') == 'true')
				$solicitud_informacion->solicitud_info_urgente = TRUE;
			else
				$solicitud_informacion->solicitud_info_urgente = FALSE;

			if ($solicitud_informacion->solicitud_tipo == 'REFERENCIA BIBLIOGRAFICA') {

				$rules_referencia = array(
					'referencia' => 'required|integer',
					'titulo_articulo' => 'required|max:150',
					'autor' => 'required|alpha|max:150',
					'titulo_publicacion' => 'required|max:150',
					'ano_publicacion' => 'required|integer',
					'volumen' => 'integer',
					'numero_publicacion' => 'integer',
					'pagina_inicio' => 'required|integer',
					'pagina_fin' => 'required|integer',


					);

				$validator_referencia = Validator::make($inputs,$rules_referencia);

				if($validator_referencia->fails()){
					return Redirect::back()->withInput()->withErrors($validator_referencia);
				}

				$solicitud_informacion->referencia = Input::get('referencia');

				if(Input::get('busqueda_fuente_nacional') == 'true')
					$solicitud_informacion->busqueda_fuente_nacional = TRUE;
				else
					$solicitud_informacion->busqueda_fuente_nacional = FALSE;

				if(Input::get('busqueda_fuente_internacional') == 'true')
					$solicitud_informacion->busqueda_fuente_internacional = TRUE;
				else
					$solicitud_informacion->busqueda_fuente_internacional = FALSE;
				
				$solicitud_informacion->titulo_articulo = Input::get('titulo_articulo');
				$solicitud_informacion->autor = Input::get('autor');
				$solicitud_informacion->titulo_publicacion = Input::get('titulo_publicacion');
				$solicitud_informacion->ano_publicacion = Input::get('ano_publicacion');

				if(Input::get('volumen'))
					$solicitud_informacion->volumen = Input::get('volumen');
				else
					$solicitud_informacion->volumen = NULL;

				if(Input::get('numero_publicacion'))
					$solicitud_informacion->numero_publicacion = Input::get('numero_publicacion');
				else
					$solicitud_informacion->numero_publicacion = NULL;

				$solicitud_informacion->pagina_inicio = Input::get('pagina_inicio');
				$solicitud_informacion->pagina_fin = Input::get('pagina_fin');

				$solicitud_informacion->nombre_base_datos = null;
				$solicitud_informacion->ano_inicio = null;
				$solicitud_informacion->ano_fin = null;
				$solicitud_informacion->idioma = null;
				$solicitud_informacion->comentario = null;
			} else{

				$rules_base_datos = array(
					'nombre_base_datos' => 'required|max:50',
					'ano_inicio' => 'required|integer',
					'ano_fin' => 'required|integer',
					'idioma' => 'required|alpha|max:10',
					'comentario' => 'max:150',

					);

				$validator_base_datos = Validator::make($inputs, $rules_base_datos);

				if($validator_base_datos->fails()){
					return Redirect::back()->withInput()->withErrors($validator_base_datos);
				}

				$solicitud_informacion->nombre_base_datos = Input::get('nombre_base_datos');
				$solicitud_informacion->ano_inicio = Input::get('ano_inicio');
				$solicitud_informacion->ano_fin = Input::get('ano_fin');
				$solicitud_informacion->idioma = Input::get('idioma');
				$solicitud_informacion->comentario = Input::get('comentario');

				$solicitud_informacion->referencia = null;
				$solicitud_informacion->busqueda_fuente_nacional = null;
				$solicitud_informacion->busqueda_fuente_internacional = null;
				$solicitud_informacion->titulo_articulo = null;
				$solicitud_informacion->autor = null;
				$solicitud_informacion->titulo_publicacion = null;
				$solicitud_informacion->ano_publicacion = null;
				$solicitud_informacion->volumen = null;
				$solicitud_informacion->numero_publicacion = null;
				$solicitud_informacion->pagina_inicio = null;
				$solicitud_informacion->pagina_fin = null;
			}

			if(Input::get('fk_persona') != 'NULL'){
				$solicitud_informacion->pk_fk_persona = Input::get('fk_persona');
				$solicitud_informacion->pk_fk_empresa_persona = NULL;
				$solicitud_informacion->save();
				return Redirect::to('solicitud_info');

			}else{
				$solicitud_informacion->pk_fk_empresa_persona = Input::get('fk_empresa_persona');
				$solicitud_informacion->pk_fk_persona = NULL;
				$solicitud_informacion->save();
				return Redirect::to('solicitud_info');
			}
			
			return Redirect::to('solicitud_info');
		}
	}

	public function borrar_solicitud_info(){
		$id = Input::get('idedit');
		$solicitud = Solicitud_Informacion::find($id);

		if ($solicitud->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('solicitud_info');

	}

}