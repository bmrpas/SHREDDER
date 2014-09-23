<?php

class SolicitudStatusController extends BaseController {

	public function get_status(){
		$pk_fk_status = Status::orderBy('status_nombre','ASC')->get()->lists('status_nombre','id');	
		$fk_solicitud_personas = Solicitud_Informacion::where('pk_fk_empresa_persona','=',NULL)->paginate(10);
		$fk_solicitud_empresas = Solicitud_Informacion::where('pk_fk_persona','=',NULL)->paginate(10);
		return View::make('solicitud_status.createSolicitudStatus',array('pk_fk_status'=>$pk_fk_status,'fk_solicitud_personas'=>$fk_solicitud_personas, 'fk_solicitud_empresas'=>$fk_solicitud_empresas));
	}

	public function add_status(){
		$inputs = Input::all();
		$today = Carbon::now();

			$solicitud_status = new Status_Solicitud;
			$solicitud_status->solicitud_status_fecha = $today;
			$solicitud_status->pk_fk_status = Input::get('pk_fk_status');

			if(Input::get('solicitud_persona') != null)
				$solicitud_status->pk_fk_solicitud_informacion = Input::get('solicitud_persona');
			else
				$solicitud_status->pk_fk_solicitud_informacion = Input::get('solicitud_empresa');
			
			$solicitud_status->save();

			return Redirect::to('status_solicitud');
	}

	public function mostrar_status(){

		//$solicitud_status = Status_Solicitud::all()->max('solicitud_status_fecha');

		/*$solicitud_status = DB::table('solicitud_status')
		->whereIn('id', function($query)
		    {
		        $query->select(DB::raw(1))
		              ->from('orders')
		              ->whereRaw('orders.user_id = users.id');
		    })
		    ->get();*/
		    //$query = select(DB::raw('pk_fk_solicitud_informacion from solicitud_status where pk_fk_solicitud_informacion = 9'));
		    $solicitud_status = Status_Solicitud::select(array(DB::raw('max(solicitud_status_fecha) as fecha'),'pk_fk_solicitud_informacion as si'))->groupBy('pk_fk_solicitud_informacion')->get(); // Eloquent Builder instance
		    //$solicitud_status = array($solicitud_status);

		    		
		    		$query = Status_Solicitud::where('pk_fk_solicitud_informacion','=',$solicitud_status->si);
		    		
		    

/*				$count = DB::table( DB::raw("({$sub->toSql()}) as sub") )
				    ->mergeBindings($sub->getQuery()) // you need to get underlying Query Builder
				    ->count();
*/
/*
				    DB::table('solicitud_status')
						  ->select(
						      array('id',DB::raw('concat(SUBSTRING_INDEX(description, " ",25),"...") AS description'),'category'))
						  ->order_by(\DB::raw('RAND()'))
						  ->get();*/

		   /* SELECT te.* 

FROM (select max(ss.solicitud_status_fecha)as FECHA , ss.pk_fk_solicitud_informacion from solicitud_status as ss, solicitud_informacion as si , status as s
where ss.pk_fk_solicitud_informacion = si.id and ss.pk_fk_status = s.id
group by ss.pk_fk_solicitud_informacion) AS t, solicitud_status AS te

WHERE te.pk_fk_solicitud_informacion = t.pk_fk_solicitud_informacion AND te.solicitud_status_fecha = t.FECHA
*/

		return View::make('solicitud_status.listaSolicitudStatus', array('solicitud_status' => $solicitud_status, 'query'=>$query));
	}

	public function editar_empresa_actividad(){
		$pk_fk_status = Status::orderBy('status_nombre','ASC')->get()->lists('status_nombre','id');	
		$fk_solicitud_personas = Solicitud_Informacion::where('pk_fk_empresa_persona','=',NULL)->paginate(10);
		$fk_solicitud_empresas = Solicitud_Informacion::where('pk_fk_persona','=',NULL)->paginate(10);
		$inputs = Input::get('idedit');
		$solicitud_status = Status_Solicitud::find($inputs);
		if($solicitud_status)
		return View::make('empresa_actividad.createEmpresaActividad',array('fk_empresa'=>$fk_empresa, 'fk_actividad'=>$fk_actividad, 'empresa_actividad'=>$empresa_actividad));
	else
		return Redirect::to('empresa_actividad');
	}

	public function update_empresa_actividad(){
			$id = Input::get('idedit');
			$empresa_actividad = Empresa_Actividad::find($id);
			$empresa_actividad->pk_fk_empresa = Input::get('fk_empresa');
			$empresa_actividad->pk_fk_actividad = Input::get('fk_actividad');
			$empresa_actividad->save();
			
			return Redirect::to('empresa_actividad');	
	}

	public function borrar_empresa_actividad(){
		$id = Input::get('idedit');
		$empresa_actividad = Empresa_Actividad::find($id);

		if ($empresa_actividad->delete()) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error, intentelo nuevamente');
			Session::flash('class','danger');
		}

		return Redirect::to('empresa_actividad');

	}

}