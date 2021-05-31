<?php

namespace App\Controllers;

class Reseau extends BaseController
{
	public function index()
	{
		$data = view('header');
		$data.= view('reseau');
		$data.= view('footer');
		return $data;
	}
}
