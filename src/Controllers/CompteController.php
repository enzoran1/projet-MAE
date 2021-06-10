<?php 


class CompteController extends AbstractController
{ 

    public function index()
    { 
        $this->render('compte/index.php');
    }

    public function connectUser()
    { 
        if($this->is_connected === false)
        {
            $compte = new Compte($_POST['mail'], $_POST['password'], false, false);
            $comptemanager = new CompteManager();
            $comptemanager->testConnexion();
            $compte->is_connected = true;
            $_SESSION['compte'] =  $compte;
        }
        else
        { 
            exit;
        }
    }

    public function logout()
    { 
        // ...
    }

    public function setMail($mail)
    { 
        $this->mail = $mail;
    }

    public function getMail()
    { 
        return $this->mail;
    }

    public function setPassword($password)
    { 
        $this->password = $password;
    }

    public function getPassword()
    { 
        return $this->password;
    }

    public function setRoles($roles)
    { 
        $this->roles = $roles;
    }

    public function getRoles()
    { 
        return $this->roles;
    }

    public function setIs_verified($is_verified)
    { 
        $this->is_verified = $is_verified;
    }

    public function getIs_verified()
    { 
        return $this->is_verified;
    }

    public function setIs_connected($is_connected)
    { 
        $this->is_connected = $is_connected;
    }

    public function getIs_connected()
    { 
        return $this->is_connected;
    }

}