<?php

class Solicitud_Afiliacion extends Eloquent {
	protected $table = 'solicitud_afiliacion';
	public $timestamps = false;

	public function persona(){
		return $this->belongsTo('Person', 'pk_fk_persona');
	}

	public function company(){
		return $this->belongsTo('Empresa_Persona', 'pk_fk_empresa_persona');
	}
}