<?php

Class Place Extends Eloquent {
	protected $table = 'lugar';
	public $timestamps = false;

	public function persona() {
		return $this->hasMany('Person', 'id');
	}

	public function empresa(){
		return $this->hasMany('Empresa', 'fk_lugar');
	}

	public function lugar(){
		return $this->hasMany('Place', 'fk_lugar');
	}

	public function lugarRecursivo(){
		return $this->belongsTo('Place', 'fk_lugar');
	}

	public function lugarTipo(){
		return $this->belongsTo('Lugar_Tipo', 'fk_lugar_tipo');
	}


}