<?php

Class Actividad Extends Eloquent{
	protected $table = 'actividad';
	public $timestamps = false;

	public function empresa_activad(){
		return $this->belongsToMany('Empresa', 'Empresa_Actividad', 'pk_fk_actividad', 'pk_fk_empresa');
	}
}