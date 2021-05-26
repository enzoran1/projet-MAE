<?php 

class Connexion
{ 
    private bool $isConnected; // if true, renvoyer une erreur 


    public static function index()
    { 
        require '../Views/connexionView.php';
    }

}