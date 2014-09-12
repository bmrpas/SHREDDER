<?php

Class Lugar_Tipo Extends Eloquent{
	protected $table = 'lugar_tipo';
	public $timestamps = false;

	public function lugar(){
		return $this->hasMany('Lugar', 'fk_lugar_tipo');
	}
}