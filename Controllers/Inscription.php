<?php 

use App\User\User;
require BASE_DIR. 'Controllers/User.php';

Class Inscription extends User
{ 

    public static function index()
    { 
        require '../Views/inscriptionView.php';
    }

}