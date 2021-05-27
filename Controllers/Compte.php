<?php 

class Compte 
{  

    public static function index()
    { 
        require BASE_DIR . 'Views/connexionView.php';
    }
}

if(isset($_POST['submit']))
{
    require BASE_DIR. 'Models/database.php'; 
    require BASE_DIR. 'Models/connexion.php';  
}