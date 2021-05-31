<?php 

Class User { 
    private string $email;
    private string $password; 
    private string $telephone;

    public function __construct($email, $password, $telephone)
    {
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
    }

    public function setEmail(User $email)
    { 
        $this->email = $email;
    }

    public function getEmail()
    { 
        return $this->email;
    }

    public function setPassword(User $password)
    { 
        $this->user = $password;
    }

    public function getPassword()
    { 
        return $this->password;
    }

    public function setTelephone(User $telephone)
    { 
        $this->telephone = $telephone;
    }

    public function getTelephone()
    { 
        return $this->telephone;
    }

}