<?php 


class CompteManager extends Manager
{ 

    public function testConnexion()
    { 
        if(!empty($_POST['submit']))
        {
            $query = 'SELECT FROM user (email, password) WHERE user.email = :email AND user.password = :password';
            $this->setPdoInstance(); // On fait la connexion pdo 
            $this->executeQuery($query, [$_POST['email'], $_POST['password']]);  // Requête pour mail/pass
            if($compteManager = $query->fetch())
            { 

            }
            echo 'ok';
        } 
        else
        { 
            echo 'erreur';
        }
    }

}