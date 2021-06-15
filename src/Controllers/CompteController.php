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
            if(!isset($finalQuery))
            { 
                $this->render('error/index.php');
            }
            else
            {
                $this->render('home/show.php'); 
            }
        }
    }

    public function logout()
    { 
        session_destroy();
        session_unset();
        header('Location: /Home');
    }

}

