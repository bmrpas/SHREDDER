<?php

class UsuarioController extends BaseController {

	public function get_usuario(){
		$fk_persona = Person::lists('persona_cid', 'id');
		return View::make('usuario.createUsuario',array('fk_persona' => $fk_persona));
	}

	public function add_usuario(){
		$inputs = Input::all();

		$rules = array(
			'usuario_login' => 'required|max:30|unique:usuario,usuario_login',
			'usuario_password' => 'required:usuario,usuario_password_password',
			'usuario_password_repite' => 'required|same:usuario_password',
			);
		$validator = Validator::make($inputs, $rules);
		
		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
	
		}
		else{
			$usuario = new Usuario;
			$usuario->usuario_login = Input::get('usuario_login');
			$usuario->usuario_password = Hash::make(Input::get('usuario_password'));
			$usuario->fk_persona = Input::get('fk_persona');
			
			if ($usuario->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('usuario');
		}
	}

	public function mostrar_usuario(){
		$usuarios = Usuario::orderBy('usuario_login')->paginate(10);
		return View::make('usuario.listaUsuario', array('usuarios' => $usuarios));
	}

	public function editar_usuario(){
		$fk_persona = Person::lists('persona_cid', 'id');
		$inputs = Input::get('idedit');
		$usuario = Usuario::find($inputs);
		if($usuario)
		return View::make('usuario.createUsuario',array('usuario' => $usuario, 'fk_persona' => $fk_persona));
	else
		return Redirect::to('usuario');
	}

	public function update_usuario(){
		$inputs = Input::all();

		$rules = array(
			'usuario_password' => 'required:usuario,usuario_password_password',
			'usuario_password_repite' => 'required|same:usuario_password',
			);
		$validator = Validator::make($inputs,$rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}
		else{
			$id = Input::get('idedit');
			$usuario = Usuario::find($id);
			$usuario->usuario_password = Hash::make(Input::get('usuario_password'));
			$usuario->fk_persona = Input::get('fk_persona');
			
			if ($usuario->save()) {
			Session::flash('message','Guardado Correctamente');
			Session::flash('class','success');
			}
			else{
				Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
				Session::flash('class','danger');
			}
			return Redirect::to('usuario');

		}	
	}

	public function borrar_usuario(){
		$id = Input::get('idedit');
		$usuario = Usuario::find($id);

		if ($usuario->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('usuario');

	}

}