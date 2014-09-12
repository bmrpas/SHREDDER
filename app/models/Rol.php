<?php

Class Rol Extends Eloquent{
	protected $table = 'rol';
	public $timestamps = false;

	public function usuario(){
		return $this->belongsToMany('Usuario','Rol_Usuario', 'pk_fk_rol', 'pk_fk_usuario');
	}

	public function accion(){
		return $this->belongsToMany('Accion', 'Accion_Rol', 'fk_rol', 'fk_accion');
	}
}