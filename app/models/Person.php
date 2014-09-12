<?php

Class Person Extends Eloquent{
	protected $table = 'persona';
	public $timestamps = false;

	public function profesion(){
		return $this->belongsTo('Profesion','fk_profesion');
	}

	public function cargo(){
		return $this->belongsTo('Cargo', 'fk_cargo');
	}

	public function lugar(){
		return $this->belongsTo('Place', 'fk_lugar');
	}

	public function persona(){
		return $this->hasOne('Person', 'id');
	}

	public function persona_recursiva(){
		return $this->belongsTo('Person', 'fk_persona_a_quien_autorizo');
	}

	public function usuario(){
		return $this->hasOne('Usuario', 'fk_persona');
	}

	public function telefono(){
		return $this->hasMany('Telefono', 'fk_persona');
	}

	public function persona_area_interes(){
		return $this->belongsToMany('Area_Interes', 'Persona_Area_Interes', 'pk_fk_persona', 'pk_fk_area_interes');
	}

	public function company(){
		return $this->belongsTo('Empresa_Persona', 'fk_persona')->withPivot('es_representante');
	}

	public function solicitud_afiliacion(){
		return $this->hasOne('Person', 'pk_fk_persona');
	}

	public function solicitud_informacion(){
		return $this->hasMany('Solicitud_Informacion', 'pk_fk_persona');
	}

	public function getFullNameAttribute()
    {
        return "C.I:$this->persona_cid; $this->persona_primer_apellido $this->persona_segundo_apellido, $this->persona_primer_nombre";
    }

}