<?php

class WebController extends BaseController{

	public function index()
	{
		$sitios = Sitios::first();
		return View::make('index',array('sitios' => $sitios));
	}

}