<?php

class TelefonoController extends BaseController {

	public function get_telefono(){
		$fk_empresa = Empresa::get()->lists('full_name','id');
		$fk_persona = Person::orderBy('persona_cid','ASC')->get()->lists('full_name','id');	

		return View::make('telefono.createTelefono',array('fk_empresa'=>$fk_empresa,'fk_persona'=>$fk_persona));
	}

	public function add_telefono(){
		$inputs = Input::all();

		$rules = array(
			'telefono' => 'required|numeric|unique:telefono,telefono',
			'telefono_secundario' => 'numeric',
			'telefono_fax' => 'numeric',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$telefono = new Phone;
			$telefono->telefono = Input::get('telefono');
			$telefono->telefono_secundario = Input::get('telefono_secundario');
			$telefono->telefono_fax = Input::get('telefono_fax');
			if(Input::get('fk_persona') != 'NULL'){
				$telefono->fk_persona = Input::get('fk_persona');
				$telefono->fk_empresa = NULL;
				$telefono->save();
				return Redirect::to('telefono');

			}else{
				$telefono->fk_empresa = Input::get('fk_empresa');
				$telefono->fk_persona = NULL;
				$telefono->save();
				return Redirect::to('telefono');
			}
			
			return Redirect::to('telefono');
		}
	}

	public function mostrar_telefono(){
		$telefono_persona = Phone::where('fk_empresa','=',null)->orderBy('fk_persona')->paginate(10);
		$telefono_empresa = Phone::where('fk_persona','=',null)->orderBy('fk_empresa')->paginate(10);
		return View::make('telefono.listaTelefono', array('telefono_persona' => $telefono_persona,'telefono_empresa'=>$telefono_empresa));
	}

	public function editar_telefono(){
		$fk_empresa = Empresa::get()->lists('full_name','id');
		$fk_persona = Person::orderBy('persona_cid','ASC')->get()->lists('full_name','id');		
		$inputs = Input::get('idedit');
		$telefono = Phone::find($inputs);
		if($telefono)
		return View::make('telefono.createTelefono',array('fk_empresa'=>$fk_empresa, 'fk_persona'=>$fk_persona, 'telefono'=>$telefono));
	else
		return Redirect::to('telefono');
	}

	public function update_telefono(){
		$inputs = Input::all();

		$rules = array(
			'telefono' => 'required|numeric|unique:telefono,telefono,'.Input::get('idedit'),
			'telefono_secundario' => 'numeric',
			'telefono_fax' => 'numeric',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$id = Input::get('idedit');
			$telefono = Phone::find($id);
			$telefono->telefono = Input::get('telefono');
			$telefono->telefono_secundario = Input::get('telefono_secundario');
			$telefono->telefono_fax = Input::get('telefono_fax');
			$telefono->save();
			
			return Redirect::to('telefono');
		}	
	}

	public function borrar_telefono(){
		$id = Input::get('idedit');
		$telefono = Phone::find($id);

		if ($telefono->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('telefono');

	}

}