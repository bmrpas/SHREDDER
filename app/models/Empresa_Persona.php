<?php

Class Empresa_Persona Extends Eloquent{
	protected $table = 'empresa_persona';
	public $timestamps = false;

	public function representante(){
		return $this->belongsTo('Person', 'fk_persona');
	}

	public function empresa(){
		return $this->belongsTo('Empresa','fk_empresa');
	}

	public function solicitud_informacion(){
		return $this->hasMany('Solicitud_Informacion', 'pk_fk_empresa_persona');
	}

	public function solicitud_afiliacion(){
		return $this->hasOne('Solicitud_Afiliacion', 'pk_fk_empresa_persona');
	}

	public function getFullNameAttribute()
    {
        return $this->representante->full_name." ;Es Representante de: ".$this->empresa->full_name;
    }
}