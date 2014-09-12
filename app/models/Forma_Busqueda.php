<?php

Class Forma_Busqueda Extends Eloquent{
	protected $table = 'forma_busqueda';
	public $timestamps = false;

	public function solicitud_informacion(){
		return $this->belongsToMany('Forma_Busqueda', 'Base_Datos_Forma_Busqueda', 'pk_fk_forma_busqueda', 'pk_fk_base_datos_solicitud_informacion');
	}
}