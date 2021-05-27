<?php 

class Compte 
{  

    public static function index()
    { 
        if(!isset($_SESSION['email']) && !isset($_SESSION['password']))
        {
            require BASE_DIR . 'Views/connexionView.php';
        }
        else
        {
            require BASE_DIR . 'Views/dashboardView.php';
        }
    }
}

if(isset($_POST['submit']))
{
    require BASE_DIR. 'Models/database.php'; 
    require BASE_DIR. 'Models/connexion.php';
}