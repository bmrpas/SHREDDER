<?php

Class Rol_Accion Extends Eloquent{
	protected $table = 'accion_rol';
	public $timestamps = false;

	public function accion(){
		return $this->belongsTo('Accion', 'fk_accion');
	}

	public function rol(){
		return $this->belongsTo('Rol','fk_rol');
	}
}