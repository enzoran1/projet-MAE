<?php 


class Compte
{ 
    private string $mail; 
    private string $password; 
    private ?array $role = ['pro', 'eleves', 'admin']; 
    private bool $is_verified = false;
    private bool $is_connected = false;

    public function __construct( array $data)
    { 
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    { 
        foreach($data as $key => $value)
        { 
            $method = 'set'. ucfirst($key);

            if(method_exists($this, $method))
            { 
                $this->$method($value);
            }
        }
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

    public function setIs_connected( bool $is_connected)
    { 
        $this->is_connected = $is_connected;
    }

    public function getIs_connected()
    { 
        return $this->is_connected;
    }

}

