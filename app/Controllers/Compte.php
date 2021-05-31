<?php

namespace App\Controllers;
use App\Controllers\User;

class Compte extends BaseController
{
	public function index()
	{
        if(!$this->user->isConnected)
        { 
            $data = view('header');
		    $data .= view('connexion');
		    $data .= view('footer');
    		return $data;
        }
        else 
        { 
            $data = view('header');
            $data .= view('compte');
            $data .= view('footer');
            return $data;
        }	
	}


}
