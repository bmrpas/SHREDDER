<?php

class Telefono extends Eloquent {
	protected $table = 'telefono';
	public $timestamps = false;

	public function persona(){
		return $this->belongsTo('Person', 'fk_persona');
	}

	public function empresa(){
		return $this->belongsTo('Empresa', 'fk_empresa');
	}
}