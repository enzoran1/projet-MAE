<?php
ob_start();
require '../inc/inc_top.php';



if(!empty($_SESSION['email']))
{ 
    echo 'Vous êtes déjà connecté(e)';
    ob_clean();
    header('Location: dashboard.php');
    die;
}


if(isset($_POST['submit']))
{
    if(
        !empty                  ($_POST['email']) 
        && !empty               ($_POST['mdp'])
    )
    { 
        require_once '../pages/cobdd.php'; 

        $yourEmail          =    $_POST['email'];
        $yourPassword       =    $_POST['mdp'];

        // 1ERE REQUETE : selectionne l'email
        $queryUser = $bdd->prepare("SELECT * FROM user WHERE email='".$yourEmail."'");
        $queryUser->execute();
        $result = $queryUser->fetch();

        // 2EME REQUETE : selectionne le mdp SI il reconnait le mail
           if(!password_verify($yourPassword, $result['mdp']))
        { 
            die('Mot de passe invalide');
        }
        else 
        { 
            ob_clean();

            $_SESSION['email'] = $result['email'];
            $_SESSION['mdp'] = $result['mdp'];
            $_SESSION['telephone'] = $result['telephone'];

            header('Location: dashboard.php');     
        }    
    }
}


?>


<h1>Connectez-vous pour accèder à de nombreuses fonctionnalités</h1>

<form action="" method="POST">

<div>
        <label for="email">
            <input type="email" name="email" id="email" placeholder="Email">
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





