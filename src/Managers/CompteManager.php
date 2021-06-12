<?php 


class CompteManager extends Manager
{ 
    public function testConnexion()
    { 
        if(!empty($_POST['email']) && !empty($_POST['password']))
        {
            $logMail = htmlentities($_POST['email']);
            $logPassword = htmlentities($_POST['password']);

            $bdd = new PDO('mysql:host=localhost;dbname=projetifa','root','');            
            $queryMail = $bdd->prepare("SELECT * FROM user WHERE email = :logMail");
            $queryMail->execute(array('logMail' => $logMail));

            if($res = $queryMail->fetch(PDO::FETCH_ASSOC))
            {
                if($logPassword == $res['password'])
                { 
                    $account = new Compte($res);
                    $account->setMail($res['email']);
                    $account->setIs_connected(true);
                    $_SESSION['compte'] = $account; 
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

    public function testInscription()
    { 
        //Silence is golden... 
        echo'ok';
    }
}
