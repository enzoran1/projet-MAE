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
                    $account->setRoles(['eleves']);
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
        if(!empty($_POST['email']) 
        && !empty($_POST['password']) 
        && !empty($_POST['telephone']))
        { 
            $mail           =       htmlEntities($_POST['email']);
            $password       =       htmlEntities($_POST['password']);
            $telephone      =       htmlEntities($_POST['telephone']);

            $bdd = new PDO('mysql:host=localhost;dbname=projetifa','root','');

            $queryMail = $bdd->prepare('SELECT * FROM user WHERE email = :email');
            $queryMail->execute(array('email' => $mail));

            // $count = $queryMail->rowCount();
            // if($queryMail->columnCount() > 0) 
            // {
            //     exit;
            // }
            // else 
            // { 
                $bdd = new PDO('mysql:host=localhost;dbname=projetifa','root','');

                $finalQuery = $bdd->prepare('INSERT into user (email, password, telephone) VALUES (?, ?, ?)');
                $finalQuery->execute(array($mail, $password, $telephone));
                $finalQuery->fetch();
            }
            

        }
    }
 
// }
