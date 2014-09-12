<?php

Class Accion Extends Eloquent{
	protected $table = 'accion';
	public $timestamps = false;

	public function rol(){
		return $this->belongsToMany('Rol', 'Accion_Rol', 'fk_accion', 'fk_rol');
	}
}