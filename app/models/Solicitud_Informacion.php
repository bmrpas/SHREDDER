<?php

Class Solicitud_Informacion Extends Eloquent{
	protected $table = 'solicitud_informacion';
	public $timestamps = false;

	public function persona(){
		return $this->belongsTo('Person', 'pk_fk_persona');
	}

	public function company(){
		return $this->belongsTo('Empresa_Persona', 'pk_fk_empresa_persona');
	}

	public function solicitud_status(){
		return $this->hasMany('Status', 'Status_Solicitud', 'pk_fk_solicitud_informacion', 'pk_fk_status')->withPivot('solicitud_status_fecha');
	}

	public function forma_busqueda(){
		return $this->belongsToMany('Forma_Busqueda', 'Base_Datos_Forma_Busqueda', 'pk_fk_base_datos_solicitud_informacion', 'pk_fk_forma_busqueda');
	}

	public function getDatosPersonaSolicitudAttribute(){

			return 'ID Solicitud: '.$this->id.' - '.' Solicitante: '.$this->persona->full_name.' - '.' Fecha: '.$this->solicitud_info_fecha;
	}

	public function getDatosEmpresaSolicitudAttribute(){
		return 'ID Solicitud: '.$this->id.' - '.' Solicitante: '.$this->company->full_name.' - '.' Fecha: '.$this->solicitud_info_fecha;
	}

}