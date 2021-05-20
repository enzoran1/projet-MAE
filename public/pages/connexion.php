<?php
ob_start();
require '../inc/inc_top.php';

if (!empty($_SESSION['email'])) {
    echo 'Vous êtes déjà connecté(e)';
    ob_clean();
    header('Location: dashboard.php');
    die;
}


if (isset($_POST['submit'])) 
{ 
    if (
        !empty($_POST['email'])
        && !empty($_POST['password'])) 
    {
        require_once '../pages/cobdd.php'; 

        $yourEmail          =    $_POST['email'];
        $yourPassword       =    $_POST['password'];
        // 1ERE REQUETE : selectionne l'email
        $queryUser = $bdd->prepare("SELECT * FROM user WHERE email='".$yourEmail."'");
        $queryUser->execute();
        $result = $queryUser->fetch();
        if($queryUser->rowCount() == 0)
        { 
            echo 'E-mail invalide';
        }
        else
        { // 2EME REQUETE : selectionne le password SI il reconnait le mail
            if (!password_verify($yourPassword, $result['password'])) 
            {
                die('Mot de passe invalide');
            }
            else
            {

                $_SESSION['email'] = $result['email'];
                $_SESSION['password'] = $result['password'];
                $_SESSION['telephone'] = $result['telephone'];

                header('Location: dashboard.php');
            }
        }    
    }
}

?>




<form action="" method="POST" class="formulaire">
    <div class="formulaire__container">
        <h3>Connexion</h3>
        <div class="formulaire__contenue">
            <label for="email">
                <input type="email" name="email" id="email" placeholder="email">
            </label>
        </div>
        <div class="formulaire__contenue">
            <label for="password">
                <input type="password" name="password" id="password" placeholder="password">
            </label>
        </div>


        <button type="submit" name="submit" value='submit'>Envoyer</button>
    </div>

</form>