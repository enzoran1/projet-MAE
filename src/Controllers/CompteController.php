<?php 


class CompteController extends AbstractController
{ 

    public function index()
    {
        if(!isset($compte))
        {  
            $this->render('compte/connexion/index.php');
        }
        else
        { 
            $this->render('compte/dashboard/index.php');
        }
    }

    public function connectUser($compte)
    { 
        {
            $comptemanager = new CompteManager();
            $comptemanager->testConnexion();
            $_SESSION['compte'] = $compte; 
            $compte->is_connected = true;
        }
    }

    public function logout()
    { 
        session_destroy();
    }

}

if(isset($_POST['submit']))
{ 
    $compteController = new CompteController();
    $compte = new Compte($_POST['email'], $_POST['password'], false, false);
    $compteController->connectUser($compte);
}
