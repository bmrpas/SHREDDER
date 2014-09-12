<?php

Class Empresa Extends Eloquent{
	protected $table = 'empresa';
	public $timestamps = false;

	public function empresa_persona(){
		return $this->belongsToMany('Person', 'Empresa_Persona', 'fk_empresa', 'fk_persona')->withPivot('es_representante');
	}

	public function empresa_actividad(){
		return $this->belongsToMany('Actividad', 'Empresa_Actividad', 'pk_fk_empresa', 'pk_fk_actividad');
	}

	public function lugar(){
		return $this->belongsTo('Place', 'fk_lugar');
	}

	public function telefono(){
		return $this->hasMany('Telefono', 'fk_telefono');
	}

		public function getFullNameAttribute()
    {
        return "RIF: $this->empresa_rif; $this->empresa_nombre - $this->empresa_siglas, Tipo de Institución: $this->empresa_tipo_institucion";
    }

}