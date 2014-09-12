<?php

Class Area_Interes Extends Eloquent{
	protected $table = 'area_interes';
	public $timestamps = false;

	public function persona(){
		return $this->belongsToMany('Persona', 'Area_Interes', 'pk_fk_area_interes', 'pk_fk_persona');
	}
}