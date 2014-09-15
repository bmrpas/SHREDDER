<?php

class WebController extends BaseController{

	public function index()
	{
		$sitios = Sitios::first();
		return View::make('index',array('sitios' => $sitios));
	}

	public function profesionIndex(){
		return View::make('profesionIndex');
	}

	public function tres(){
		return View::make('tres');
	}

	public function profesion(){
		return View::make('tres/profesion');
	}
}