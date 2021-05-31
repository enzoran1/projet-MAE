<?php 

Class User { 
    private string $email;
    private string $password; 
    private string $telephone;
    private bool $isConnected = false;
    private ?array $role = ['pro', 'eleve'];



    public function __construct($email, $password, $telephone) // Constructeur 
    {
        $this->email = $email;
        $this->password = $password;
        $this->telephone = $telephone;
        $this->isConnected = true;
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

    public function setRole(User $role)
    { 
        $this->role = $role;
    }

    public function getRole()
    { 
        return $this->role;
    }
}