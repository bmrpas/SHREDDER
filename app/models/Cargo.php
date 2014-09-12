<?php

Class Cargo extends Eloquent {
	protected $table = 'cargo';
	public $timestamps = false;

	public function persona(){
		return $this->hasMany('Person', 'id');
	}
}