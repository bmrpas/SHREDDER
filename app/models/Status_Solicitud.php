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

	 public function scopePerson($query)
    {
  
        return $query->where($this->solicitud->id,'=',NULL);
    }

    /*public static function getUsersThat ()
  {
    $mRows = DB:query( 'SELECT user.* FROM state, user WHERE state.current = "blah" AND user.state_id = state.id;' );
    // Convert results to a user::Eloquent model
    $mUsers = array();
    foreach( $mRows as $mRow )
    {
      $mR = ( array ) $mRow;
      $mUsers[] = new user( $mR, true );
    }
    return $mUsers;
  }*/

}