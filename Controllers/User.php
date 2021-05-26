<?php 

class User
{ 
    private function __construct($email, $password, $tel)
    {
        $this->$email = $email;
        $this->$password = $password;
        $this->$tel = $tel;
    }

    public static function index()
    { 
        require '../Views/inscriptionView.php';
    }

    public function createUser()
    { 
        
        if(isset($_POST['email']) 
            && isset($_POST['password']) 
            && isset($_POST['tel'])) 
        { 
            $user = new User($_POST['email'], $_POST['password'], $_POST['tel']);
            require BASE_DIR. 'Models/dbConnect.php';
            require BASE_DIR. 'Models/addUser.php';
        }
        else
        { 
            return 'Erreur';
        }
    }
}