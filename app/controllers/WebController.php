<?php

class WebController extends BaseController{

	public function index()
	{
		return View::make('index');
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