<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = view('header');
		$data.= view('home');
		$data.= view('footer');
		return $data;
	}
}
