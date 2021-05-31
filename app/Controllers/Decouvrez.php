<?php

namespace App\Controllers;

class Decouvrez extends BaseController
{
	public function index()
	{
		$data = view('header');
		$data.= view('decouvrez');
		$data.= view('footer');
		return $data;
	}
}
