<?php

Class Status Extends Eloquent{
	protected $table = 'status';
	public $timestamps = false;

	public function solicitud_status(){
		return $this->belongsToMany('Solicitud_Informacion', 'Status_Solicitud', 'pk_fk_status', 'pk_fk_solicitud_informacion')->withPivot('solicitud_status_fecha');
	}
}