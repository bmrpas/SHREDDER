<?php

Class Status_Solicitud Extends Eloquent{
	protected $table = 'solicitud_status';
	public $timestamps = false;

	public function status(){
		return $this->belongsTo('Status', 'pk_fk_status');
	}

	public function solicitud(){
		return $this->belongsTo('Solicitud_Informacion','pk_fk_solicitud_informacion');
	}

}