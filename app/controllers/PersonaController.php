<?php

class PersonaController extends BaseController {

	public function get_persona(){
		$fk_lugar = Place::lists('lugar_nombre', 'id');
		$fk_profesion = Profesion::lists('profesion_nombre', 'id');
		$fk_cargo = Cargo::lists('cargo_nombre', 'id');
		$fk_persona_a_quien_autorizo = Person::where('persona_es_autorizado','=',FALSE)->lists('persona_cid', 'id');
		return View::make('persona.createPersona',array('fk_lugar'=>$fk_lugar, 'fk_profesion'=>$fk_profesion, 'fk_cargo'=>$fk_cargo, 'fk_persona_a_quien_autorizo'=>$fk_persona_a_quien_autorizo));
	}

	public function add_persona(){
		$inputs = Input::all();

		$rules = array(
			'persona_cid' => 'required|integer|unique:persona,persona_cid',
			'persona_primer_apellido' => 'required|max:50|alpha:persona,persona_primer_apellido',
			'persona_segundo_apellido' => 'required|max:50|alpha:persona,persona_segundo_apellido',
			'persona_primer_nombre' => 'required|max:50|alpha:persona,persona_primer_nombre',
			'persona_segundo_nombre' => 'max:50|alpha:persona,persona_segundo_nombre',
			'persona_sexo' => 'required|max:1|alpha:persona,persona_sexo',
			'persona_fecha_nac'=> 'required|date:persona,persona_fecha_nac',
			'persona_grado_instruccion' => 'required|max:20|alpha:persona,persona_grado_instruccion',
			'persona_mail' => 'required|max:50|email:persona,persona_mail',
			'persona_departamento' => 'alpha|max:50:persona,persona_departamento',
			
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
	
		}
		else{
			$persona = new Person;
			$persona->persona_cid = Input::get('persona_cid');
			$persona->persona_primer_apellido = Input::get('persona_primer_apellido');
			$persona->persona_segundo_apellido = Input::get('persona_segundo_apellido');
			$persona->persona_primer_nombre = Input::get('persona_primer_nombre');

			if(Input::get('persona_segundo_nombre') != 'NULL'){
				$persona->persona_segundo_nombre = Input::get('persona_segundo_nombre');
			}else{
				$persona->persona_segundo_nombre = null;
			}

			$persona->persona_sexo = Input::get('persona_sexo');
			$persona->persona_fecha_nac = Input::get('persona_fecha_nac');
			$persona->persona_grado_instruccion = Input::get('persona_grado_instruccion');
			$persona->persona_mail = Input::get('persona_mail');
			
			if(Input::get('persona_departamento') != 'NULL'){
				$persona->persona_departamento = Input::get('persona_departamento');
			}else{
				$persona->persona_departamento = NULL;
			}

			$persona->fk_profesion = Input::get('fk_profesion');
			$persona->fk_cargo = Input::get('fk_cargo');
			$persona->fk_lugar = Input::get('fk_lugar');

			if(Input::get('fk_persona_a_quien_autorizo') != 'NULL'){
				$persona->fk_persona_a_quien_autorizo = Input::get('fk_persona_a_quien_autorizo');
				$persona->fk_persona_quien_me_autorizo = NULL;
				$persona->persona_es_autorizado = FALSE;
				$persona->save();
				
				$persona_a_quien_autorizo = Person::find($persona->fk_persona_a_quien_autorizo);
				$persona_a_quien_autorizo->persona_es_autorizado = TRUE;
				$persona_a_quien_autorizo->fk_persona_quien_me_autorizo = $persona->id;
				$persona_a_quien_autorizo->save();

				return Redirect::to('persona');

		}else{
			$persona->fk_persona_a_quien_autorizo = NULL;
			$persona->fk_persona_quien_me_autorizo = NULL;
			$persona->persona_es_autorizado = FALSE;
			$persona->save();

			return Redirect::to('persona');
		}
			
			return Redirect::to('persona');
		}
	}

	public function mostrar_persona(){
		$personas = Person::orderBy('persona_cid')->paginate(10);
		return View::make('persona.listaPersona', array('personas' => $personas));
	}

	public function editar_persona(){
		$fk_lugar = Place::lists('lugar_nombre', 'id');
		$fk_profesion = Profesion::lists('profesion_nombre', 'id');
		$fk_cargo = Cargo::lists('cargo_nombre', 'id');
		$inputs = Input::get('idedit');
		$persona = Person::find($inputs);
		$fk_persona_a_quien_autorizo = Person::where('persona_cid','!=',$persona->persona_cid)->where('persona_es_autorizado','=',false)->lists('persona_cid', 'id');
		if($persona)
		return View::make('persona.createPersona',array('persona'=>$persona, 'fk_lugar'=>$fk_lugar, 'fk_profesion'=>$fk_profesion, 'fk_cargo'=>$fk_cargo, 'fk_persona_a_quien_autorizo'=>$fk_persona_a_quien_autorizo));
	else
		return Redirect::to('persona');
	}

	public function update_persona(){
		$inputs = Input::all();
		$id = Input::get('idedit');
		$persona = Person::find($id);

		$rules = array(
			//'persona_cid' => 'required|integer|unique:persona,persona_cid,'.$persona->persona_cid,
			'persona_primer_apellido' => 'required|max:50|alpha:persona,persona_primer_apellido',
			'persona_segundo_apellido' => 'required|max:50|alpha:persona,persona_segundo_apellido',
			'persona_primer_nombre' => 'required|max:50|alpha:persona,persona_primer_nombre',
			'persona_segundo_nombre' => 'max:50|alpha:persona,persona_segundo_nombre',
			'persona_sexo' => 'required|max:1|alpha:persona,persona_sexo',
			'persona_fecha_nac'=> 'required|date:persona,persona_fecha_nac',
			'persona_grado_instruccion' => 'required|max:20|alpha:persona,persona_grado_instruccion',
			//'persona_mail' => 'unique|required|max:50|email:persona,persona_mail',
			'persona_departamento' => 'alpha|max:50:persona,persona_departamento',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$persona = Person::find($id);
			//$persona->persona_cid = $persona->persona_cid;
			$persona->persona_primer_apellido = Input::get('persona_primer_apellido');
			$persona->persona_segundo_apellido = Input::get('persona_segundo_apellido');
			$persona->persona_primer_nombre = Input::get('persona_primer_nombre');

			if(Input::get('persona_segundo_nombre') != 'NULL'){
				$persona->persona_segundo_nombre = Input::get('persona_segundo_nombre');
			}else{
				$persona->persona_segundo_nombre = null;
			}

			$persona->persona_sexo = Input::get('persona_sexo');
			$persona->persona_fecha_nac = Input::get('persona_fecha_nac');
			$persona->persona_grado_instruccion = Input::get('persona_grado_instruccion');
			//$persona->persona_mail = Input::get('persona_mail');

				if(Input::get('persona_departamento') != 'NULL'){
				$persona->persona_departamento = Input::get('persona_departamento');
			}else{
				$persona->persona_departamento = NULL;
			}

			$persona->fk_lugar = Input::get('fk_lugar');
			$persona->fk_profesion = Input::get('fk_profesion');
			$persona->fk_cargo = Input::get('fk_cargo');
			
			if(Input::get('fk_persona_a_quien_autorizo') != 'NULL'){
				$persona->fk_persona_a_quien_autorizo = Input::get('fk_persona_a_quien_autorizo');
				$persona->fk_persona_quien_me_autorizo = NULL;
				$persona->persona_es_autorizado = FALSE;
				$persona->save();
				
				$persona_a_quien_autorizo = Person::find($persona->fk_persona_a_quien_autorizo);
				$persona_a_quien_autorizo->persona_es_autorizado = TRUE;
				$persona_a_quien_autorizo->fk_persona_quien_me_autorizo = $persona->id;
				$persona_a_quien_autorizo->save();

				return Redirect::to('persona');

		}else{
			$persona->fk_persona_a_quien_autorizo = NULL;
			$persona->fk_persona_quien_me_autorizo = NULL;
			$persona->persona_es_autorizado = FALSE;
			$persona->save();

			return Redirect::to('persona');
		}
			
			return Redirect::to('persona');

		}	
	}

	public function borrar_persona(){
		$id = Input::get('idedit');
		$persona = Person::find($id);

		if ($persona->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('persona');

	}

}