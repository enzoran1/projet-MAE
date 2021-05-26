<?php 

class User
{ 
    private string $email;
    private string $password;
    private string $tel;

    public static function index()
    { 
        require '../Views/inscriptionView.php';
    }

    public function createUser()
    { 
        require BASE_DIR. 'Models/dbConnect.php';
        if(isset($_POST['email']) 
            && isset($_POST['password']) 
            && isset($_POST['tel'])) 
        { 
            $user = new User();
            $user->setNewUser($bdd);
        }
        else
        { 
            return 'Erreur';
        }
    }
}