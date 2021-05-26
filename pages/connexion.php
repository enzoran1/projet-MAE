<?php
ob_start();
require '../inc/inc_top.php';
require_once '../pages/cobdd.php'; 


if(!empty($_SESSION['mail']))
{ 
    echo 'Vous êtes déjà connecté(e)';
    ob_clean();
    header('Location: ../pages/dashboard.php');
    die;
}


if(isset($_POST['submit']))
{
    if(
        !empty                  ($_POST['mail']) 
        && !empty               ($_POST['mdp'])
    )
    { 
         

        $mail      =    $_POST['mail'];
        $mdp       =    $_POST['mdp'];

        // 1ERE REQUETE : selectionne l'email
        $queryUser = $bdd->prepare("SELECT * FROM user WHERE mail='".$mail."'");
        $queryUser->execute();
        $result = $queryUser->fetch();

        // 2EME REQUETE : selectionne le mdp SI il reconnait le mail
           if(password_verify($mdp, $result['mdp'])) //Il faut enlever le point d'interrogation
        { 
            die('Mot de passe invalide');
        }
        else 
        { 
            ob_clean();

            $_SESSION['mail'] = $result['mail'];
            $_SESSION['mdp'] = $result['mdp'];
            $_SESSION['telephone'] = $result['telephone'];

            header('Location: ../pages/dashboard.php');     
        }    
    }
}


?>


<h1>Connectez-vous pour accèder à de nombreuses fonctionnalités</h1>

<form action="" method="POST">

<div>
        <label for="mail">
            <input type="email" name="mail" id="mail" placeholder="Email">
        </label>
    </div>
    <div>
        <label for="password">
            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
        </label>
    </div>

    <button type="submit" name="submit" value='submit'>Envoyer</button>

</form>

<h2> <a href="../index.php"> Retour au menu </a> </h2>





