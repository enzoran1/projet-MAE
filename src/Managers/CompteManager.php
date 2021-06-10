<?php 



class CompteManager extends Manager
{ 

    public function testConnexion()
    { 
        $query = 'SELECT email, password from user WHERE user.email = :email AND user.password = :password';
        $this->setPdoInstance(); // On fait la connexion pdo 
        $this->executeQuery($query, [$_POST['email'], $_POST['password']]);  // Requête pour mail/pass
        echo 'ok';
    }

}