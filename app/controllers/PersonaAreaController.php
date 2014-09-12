<?php

class PersonaAreaController extends BaseController {

	public function get_persona_area(){
		$fk_persona = Person::get()->lists('full_name','id');
		$fk_area = Area_Interes::get()->lists('area_interes_nombre','id');	

		return View::make('persona_area_interes.createPersonaArea',array('fk_persona'=>$fk_persona,'fk_area'=>$fk_area));
	}

	public function add_persona_area(){
		$inputs = Input::all();

			$persona_area = new Persona_Area_Interes;
			$persona_area->pk_fk_persona = Input::get('fk_persona');
			$persona_area->pk_fk_area_interes = Input::get('fk_area');
			$persona_area->save();

			return Redirect::to('persona_area');
	}

	public function mostrar_persona_area(){
		$persona_area = Persona_Area_Interes::orderBy('pk_fk_area_interes')->paginate(10);

		return View::make('persona_area_interes.listaPersonaArea', array('persona_area' => $persona_area));
	}

	public function editar_persona_area(){
		$fk_persona = Person::get()->lists('full_name','id');
		$fk_area = Area_Interes::get()->lists('area_interes_nombre','id');	
		$inputs = Input::get('idedit');
		$persona_area = Persona_Area_Interes::find($inputs);
		if($persona_area)
		return View::make('persona_area_interes.createPersonaArea',array('fk_persona'=>$fk_persona, 'fk_area'=>$fk_area, 'persona_area'=>$persona_area));
	else
		return Redirect::to('persona_area');
	}

	public function update_persona_area(){
			$id = Input::get('idedit');
			$persona_area = Persona_Area_Interes::find($id);
			$persona_area->pk_fk_persona = Input::get('fk_persona');
			$persona_area->pk_fk_area_interes = Input::get('fk_area');
			$persona_area->save();
			
			return Redirect::to('persona_area');	
	}

	public function borrar_persona_area(){
		$id = Input::get('idedit');
		$persona_area = Persona_Area_Interes::find($id);

		if ($persona_area->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('persona_area');

	}

}