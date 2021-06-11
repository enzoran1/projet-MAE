<?php 


class CompteManager extends Manager
{ 
    private mixed $sql;

    public function testConnexion()
    { 
        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            $logMail = htmlentities($_POST['email']);
            $logPassword = htmlentities($_POST['password']);

            $bdd = new PDO('mysql:host=localhost;dbname=projetifa','root','');            
            $queryMail = $bdd->prepare("SELECT * FROM user WHERE email = :logMail");
            $queryMail->execute(array('logMail' => $logMail));

            if($res = $queryMail->fetch())
            {
                if(password_verify($logPassword, $res['password']))
                { 
                    echo 'ok'; 
                }
                else
                {
                    echo 'false';
                }
            }
            else
            { 
                echo 'erreur sur les identifiants';
            }
        }
    }
}
