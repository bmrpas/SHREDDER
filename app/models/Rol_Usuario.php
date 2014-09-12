<?php

Class Rol_Usuario Extends Eloquent{
	protected $table = 'rol_usuario';
	public $timestamps = false;

	public function usuario(){
		return $this->belongsTo('Usuario', 'pk_fk_usuario');
	}

	public function rol(){
		return $this->belongsTo('Rol','pk_fk_rol');
	}
}