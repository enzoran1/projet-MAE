<?php 


class CompteController extends AbstractController
{ 

    public function index()
    {
        if(empty($_SESSION))
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
            $this->render('home/index.php'); 
            
        }
    }

    public function logout()
    { 
        session_destroy();
        session_unset();
        header('Location: /Home');
    }
}



/* Il faut intégrer condition en fonction si l'utilisateur est pro ou eleve .. et afficher en 
fonction les bonnes rubriques

*/ 