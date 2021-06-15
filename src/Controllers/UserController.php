<?php 


class UserController extends AbstractController
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
            $usermanager = new UserManager();
            $usermanager->testConnexion();
            $this->render('home/indexuser.php'); 
            
        }
    }

    public function logout()
    { 
        session_destroy();
        session_unset();
        header('Location: /Home');
    }

}

