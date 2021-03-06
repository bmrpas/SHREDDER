<?php

class Usuario extends Eloquent {
	protected $table = 'usuario';
	public $timestamps = false;

		public static function isLogged()
	{
		if(Session::has('usuario_id'))
			return true;
		else
			return false;
	}


	public function persona(){
		return $this->belongsTo('Person', 'fk_persona');
	}

	public function rol(){
		return $this->belongsToMany('Rol', 'Rol_Usuario','pk_fk_usuario', 'pk_fk_rol');
	}

}