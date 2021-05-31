<?php

namespace App\Controllers;

class Association extends BaseController
{
	public function index()
	{
		$data = view('header');
		$data.= view('association');
		$data.= view('footer');
		return $data;
	}
}
