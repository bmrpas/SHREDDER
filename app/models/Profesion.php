<?php

class Profesion extends Eloquent {
	protected $table = 'profesion';
	public $timestamps = false;

	public function persona(){
		return $this->hasMany('Person', 'id');
	}
}