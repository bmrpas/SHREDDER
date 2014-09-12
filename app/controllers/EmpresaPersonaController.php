<?php

class EmpresaPersonaController extends BaseController {

	public function get_empresa_persona(){
		$fk_empresa = Empresa::get()->lists('full_name', 'id');
		$fk_persona = Person::where('persona_es_autorizado','=',FALSE)->get()->lists('full_name','id');	
		//$today = Carbon::today()->toDateString();	

		return View::make('empresa_persona.createEmpresaPersona',array('fk_empresa'=>$fk_empresa,'fk_persona'=>$fk_persona));
	}

	public function add_empresa_persona(){
			$empresa_persona = new Empresa_Persona;
			$empresa_persona->fk_empresa = Input::get('fk_empresa');
			$empresa_persona->fk_persona = Input::get('fk_persona');
			if(Input::get('es_representante') == 'true'){
				$empresa_persona->es_representante = TRUE;
			}else{
				$empresa_persona->es_representante = FALSE;
			}
			$empresa_persona->save();
			
			return Redirect::to('empresa_persona');
		}

	public function mostrar_empresa_persona(){
		$personas_relacionadas = Empresa_Persona::paginate(5);
		return View::make('empresa_persona.listaEmpresaPersona', array('personas_relacionadas' => $personas_relacionadas));
	}

	public function editar_empresa_persona(){
		$fk_empresa = Empresa::get()->lists('full_name', 'id');
		$fk_persona = Person::where('persona_es_autorizado','=',FALSE)->orderBy('persona_cid','ASC')->get()->lists('full_name','id');
		$inputs = Input::get('idedit');
		$empresa_persona = Empresa_Persona::find($inputs);
		if($empresa_persona)
		return View::make('empresa_persona.createEmpresaPersona',array('fk_empresa'=>$fk_empresa, 'fk_persona'=>$fk_persona, 'empresa_persona'=>$empresa_persona));
	else
		return Redirect::to('empresa_persona');
	}

	public function update_empresa_persona(){
			$id = Input::get('idedit');
			$empresa_persona = Empresa_Persona::find($id);
			$empresa_persona->fk_empresa = Input::get('fk_empresa');
			$empresa_persona->fk_persona = Input::get('fk_persona');
			if(Input::get('es_representante') == 'true'){
				$empresa_persona->es_representante = TRUE;
			}else{
				$empresa_persona->es_representante = FALSE;
			}
			$empresa_persona->save();
			
			return Redirect::to('empresa_persona');

		}	

	public function borrar_empresa_persona(){
		$id = Input::get('idedit');
		$empresa_persona = Empresa_Persona::find($id);

		if ($empresa_persona->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('empresa_persona');

	}

}