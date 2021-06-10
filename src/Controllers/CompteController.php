<?php 


class CompteController extends AbstractController
{ 

    public function index()
    {
        if(!isset($_SESSION['compte']))
        {  
            $this->render('compte/connexion/index.php');
        }
        else
        { 
            $this->render('compte/dashboard/index.php');
        }
    }

    public function connexion()
    { 
        {
            $comptemanager = new CompteManager();
            $comptemanager->testConnexion();
            $compte = new Compte($_POST['email'], $_POST['password'], false, false);
            $compte->is_connected = true;
            $_SESSION['compte'] = $compte; 
        }
    }

    public function logout()
    { 
        session_destroy();
    }

}

