<?php

Class Persona_Area_Interes Extends Eloquent{
	protected $table = 'persona_area_interes';
	public $timestamps = false;

	public function persona(){
		return $this->belongsTo('Person', 'pk_fk_persona');
	}

	public function area(){
		return $this->belongsTo('Area_Interes', 'pk_fk_area_interes');
	}
}