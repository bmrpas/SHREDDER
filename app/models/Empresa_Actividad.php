<?php

Class Empresa_Actividad Extends Eloquent{
	protected $table = 'empresa_actividad';
	public $timestamps = false;

	public function empresa(){
		return $this->belongsTo('Empresa', 'pk_fk_empresa');
	}

	public function actividad(){
		return $this->belongsTo('Actividad','pk_fk_actividad');
	}
}